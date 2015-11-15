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

            <div class="map-holder col-md-9">
                <div id="map"></div>
            </div>

            <div class="col-md-3">
                <div id="feed">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="profile_icon_sm" src="image/icon-sm-2.png">
                        </div>
                        <div class="col-md-9">
                            <p>
                                Wellesley Arreza<br/>
                                Senior, Class of 2016<br/>
                                Campus Square
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img class="profile_icon_sm" src="image/icon-sm-b.png">
                        </div>
                        <div class="col-md-9">
                            <p>
                                Bryan Huser,<br/>
                                Sophomore, Class of 2018<br/>
                                Sayre Park
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img class="profile_icon_sm" src="image/icon-sm-3.png">
                        </div>
                        <div class="col-md-9">
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


        <script>
            var temp;


            // centered at Boston, MA.
            function initMap() {
                var cen = {lat: 42.359899, lng: -71.058299};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: cen
                });




                $.ajax({
                    url: 'http://sleepy-sierra-9008.herokuapp.com/', //http://localhost:8080/
                    type: "POST",
                    data: urlSTR,
                    //http://rss.nytimes.com/services/xml/rss/nyt/World.xml
                    //http://feeds.bbci.co.uk/news/rss.xml?edition=int
                    //http://america.aljazeera.com/content/ajam/articles.rss
                    //http://feeds.reuters.com/Reuters/worldNews
                    success: function (data) {
                        //console.log(data);
                        /*
                         * data.results
                         * aljazeera
                         // doha Qatar
                         // Latitutde: 25.2916097
                         // long : 51.5304368
                         */

                        $(data).find("item").each(function () {
                            var title = $(this).find("title").text();
                            var link = $(this).find("guid").text();
                            var description = $(this).find("description").text();
                            var randomLat = Math.floor(Math.random() * 6) + 1;
                            var randomLng = Math.floor(Math.random() * 6) + 1;
                            var marker = new google.maps.Marker({
                                position: {lat: 25.2916097 + randomLat, lng: 51.5304368 + randomLng},
                                map: map,
                                title: 'Al Jazeera'
                                        //icon: iconBase + 'schools_maps.png' 

                            });

                            var infowindow = new google.maps.InfoWindow({
                                content: "<a href='" + link + "'>" + title + "</a>"
                            });
                            marker.addListener('click', function () {
                                infowindow.open(map, marker);
                            });

                            $("#feed").append("<a href='" + link + "'>" + title + "</a></br>");

                        });

                    },
                    failure: function (err) {
                        console.log(err);
                    }
                });


                $(".myButton").on('click', function () {
                    var str = $("#search").val();
                    var arr = str.split(" ");
                    var urlParam = "";
                    for (i = 0; i < arr.length; i++) {
                        if (i > 1) {
                            urlParam += '%20';
                        }
                        urlParam += arr[i];
                    }
                    urlSTR = 'https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=' + urlParam;
                    $.ajax({
                        url: 'http://sleepy-sierra-9008.herokuapp.com/', //http://localhost:8080/
                        type: "POST",
                        data: urlSTR,
                        //http://rss.nytimes.com/services/xml/rss/nyt/World.xml
                        //http://feeds.bbci.co.uk/news/rss.xml?edition=int
                        //http://america.aljazeera.com/content/ajam/articles.rss
                        //http://feeds.reuters.com/Reuters/worldNews
                        success: function (data) {

                            console.log(JSON.stringify(eval('(' + data + ')')));
                            data = JSON.stringify(eval('(' + data + ')'));
                            data = JSON.parse(data);
                            $("#feed").empty();
                            data.responseData.results.forEach(function (d) {
                                console.log(d);
                                //content
                                //publisher
                                //title
                                //url

                                var link = d.unescapedUrl;
                                var title = d.title;

                                $("#feed").append("<p><a href='" + link + "'>" + title + "</a></br></p>");
                            });

                        },
                        failure: function (err) {
                            console.log(err);
                        }
                    });
                });



            }



        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtsahT-DcfUvJP95jJX-8KtPsgnLvHMK0&callback=initMap"
        async defer></script>
    </body>
</html>

