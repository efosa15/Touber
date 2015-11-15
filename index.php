<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Touber</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/3-col-portfolio.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <style>
            body{
                background-image: url("https://college.harvard.edu/sites/default/files/Campus%20Aerial%20(Strong%20Start)Sized.jpg");
                background-repeat: no-repeat;
                background-size:100%;
            }
            .main-content{
                height: 450px;
            }
            #Start{
                margin-top:50px;
            }
            #Profile{
                margin-top:10px;
                background-color:#1C5055;
            }
        </style>
        <script>
        $(function(){
           $("#Start").on("click",function(){
              window.location.href = "map.php";
           }); 
        });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a id="headerMenu" class="navbar-brand" href="index.php">Touber</a>
                </div>

                <div>
                    <ul class="nav navbar-nav">
                        <li id="act" class="active"><a href="index.php">Home</a></li>
                        <li><a id="headerMenu" href="map.php">Map</a></li>
                        <li><a id="headerMenu"href="survey.php">Survey</a></li>
                        <li><a id="headerMenu" href="#">Help</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container main-content" style="background-color: rgba(255, 255, 255, 0.56);">

            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="header" class="page-header">Welcome to Touber :)

                    </h1>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12"> 
                    <p id="content">Many people come and go, some of them for pleasure, others for responsibilities such as work and studies...
                        But what do all this people have in common? Many of them don't know the place they are going to and even less
                        where they are going to stay. Isn't that scary? Pretty scary. </br></br>
                        Touber matches current students (and people) in your city with tourists,
                        families, new students... Everyone! So you can get a tour to the most appealing and interesting places in city. It doesn't 
                        matter your intentions! Maybe you just saw a point of interest in the map and want to go to visit with someone who has what you need: information about the place and
                        knowledge! Students love knowledge... and so do you.
                </div>
            </div>

            <div class="row">
                <div class="col-lg-offset-4 col-lg-4" style="text-align: center;">
                    <button id="Start" class="btn btn-success btn-group">Campus Visitors</button>
                    <br/>
                     <button id="Profile" class="btn btn-primary btn-group">Current Students</button>
                </div>
            </div>
            
        </div>

    </body>
</html>
