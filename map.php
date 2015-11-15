<!DOCTYPE html>
<html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>

            .profile_icon_sm{
                border-radius: 50%;
                height: 100%;
                width: 50px;
            }
            .stat{
                position:absolute;
                z-index:300;
                left:200px;

                width:100px;
            }
            iframe{
                width:1000px;
                height:1000px;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            #map {
                height: 100%;


            }
            #feed{
                position: absolute;
                right: 4px;
                overflow-y: scroll;
                height:650px;
                background-color: rgba(25, 20, 20, 0.7);
                color:white;
                font-family: Verdana, Geneva, sans-serif;
            }
            .map-holder{
                height:650px;

            }

            ::-webkit-scrollbar {
                width: 12px;
            }

            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                border-radius: 10px;
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="./js/xml2json.js"></script>
    </head>
    <body>

        <div class="row">

            <div class="map-holder col-md-12">
                <div id="map"></div>
            </div>

            <div class="">
                <div id="feed">
                    <br/>
                    <div class="row">

                        <div class="col-md-offset-1 col-md-3">
                            <img class="profile_icon_sm" src="image/icon-sm-2.png">
                        </div>
                        <div class="col-md-8">
                            <p>
                                Wellesley Arreza<br/>
                                Senior, Class of 2016<br/>
                                Campus Square
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                            <img class="profile_icon_sm" src="image/icon-sm-b.png">
                        </div>
                        <div class="col-md-8">
                            <p>
                                Bryan Huser,<br/>
                                Sophomore, Class of 2018<br/>
                                Sayre Park
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-3">
                            <img class="profile_icon_sm" src="image/icon-sm-3.png">
                        </div>
                        <div class="col-md-8">
                            <p>
                                Sara Parker<br/>
                                Junior, Class of 2017<br/>
                                Dravo House
                            </p>

                        </div>
                    </div>


                </div>
            </div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtsahT-DcfUvJP95jJX-8KtPsgnLvHMK0&callback=initMap"
        async defer></script>
        <script>
            var temp;
            var map;
            var markers = [];
            var markerCount = 0;

            // centered at Boston, MA.
            function initMap() {
                var cen = {lat: 42.359899, lng: -71.058299};
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: cen
                });






                var infoGlobal = null;
                $(function () {

                    //  var cen = {lat: 42.359899, lng: -71.058299};
                    var randomLat = (Math.floor(Math.random() * 2) + 1) * (Math.floor(Math.random() * 2) === 1 ? 1 : -1);
                    var randomLng = (Math.floor(Math.random() * 2) + 1) * (Math.floor(Math.random() * 2) === 1 ? 1 : -1);

                    var lat = 42.359899 + randomLat;
                    var long = -71.058299 + randomLng;
                    var link;
                    var title;
                    var desc = "My name is...";
                    addMarker({lat: lat, lng: long}, '', link, title, desc);
                    showMarkers(map);
                    generateFixedMarkers(map);


                });

                function generateFixedMarkers(map) {
                    addMarker({lat: 42.359899, lng: -71.058329}, '', '', '', "hi my name is....");
                    addMarker({lat: 42.359300, lng: -71.058101}, '', '', '', "hi my name is....");
                    addMarker({lat: 42.359220, lng: -71.057213}, '', '', '', "hi my name is....");

                    showMarkers(map);



                }


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

                }
                ;

                // Sets the map on all markers in the array.
                function setMapOnAll(map) {
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(map);
                    }
                }

                // Removes the markers from the map, but keeps them in the array.
                function clearMarkers() {
                    setMapOnAll(null);
                }

                // Deletes all markers in the array by removing references to them.
                function deleteMarkers() {
                    clearMarkers();
                    markers = [];
                }

                // Shows any markers currently in the array.
                function showMarkers(map) {
                    setMapOnAll(map);
                }


            }
        </script>

    </body>
</html>

