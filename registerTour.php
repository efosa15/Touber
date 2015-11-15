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


        <div class="container">

            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="header" class="page-header">Where and When? 

                    </h1>
                    <div class="row">
                        <div class="col-lg-12"> 
                            First Name
                            <input type="text" class="form-control" placeholder="Text input">
                            Last Name
                            <input type="text" class="form-control" placeholder="Text input">
                            Contact Number
                            <input type="text" class="form-control" placeholder="Text input">
                            MeetUp Location
                            <input type="text" class="form-control" placeholder="Text input">
                            MeetUp Time
                            <input type="text" class="form-control" placeholder="Text input">
                            About Yourself
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-offset-10 col-lg-1">
                            <br/>
                             <button class="btn btn-success btn-group">Submit Tour Request</button>
                        </div>
                       
                    </div>
                </div>



            </div>
        </div>

    </body>
</html>
