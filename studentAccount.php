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
    <script>

        $(function () {
            /*
             * {
             "_id": "56241a14de4bf40b17112b68",
             "customer_id": "56241a12de4bf40b171120c8",
             "nickname": "Larae's Account",
             "type": "Credit Card",
             "rewards": 38546,
             "balance": 22252
             }
             
             Get ACCOUNT BALANCE
             URL:http://api.reimaginebanking.com/accounts/56241a14de4bf40b17112b68?key=bd7208d02724e6ce92a58e57ea24ecab
             
             */

            var balance;
            var urlSTR = 'http://api.reimaginebanking.com/accounts/56241a14de4bf40b17112b68?key=bd7208d02724e6ce92a58e57ea24ecab';
            $.ajax({
                url: 'http://sleepy-sierra-9008.herokuapp.com/', //http://localhost:8080/
                type: "POST",
                data: urlSTR,
                //http://rss.nytimes.com/services/xml/rss/nyt/World.xml
                //http://feeds.bbci.co.uk/news/rss.xml?edition=int
                //http://america.aljazeera.com/content/ajam/articles.rss
                //http://feeds.reuters.com/Reuters/worldNews
                success: function (data) {

                    console.log(data);
                    var obj = JSON.parse(data);
                    balance = obj.balance;
                    var html = "<p>$" + balance + "</p>";
                    $("#donations").append(html);


                },
                failure: function (err) {
                    console.log(err);
                }
            });


        });

    </script>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a id="headerMenu" class="navbar-brand" href="index.php">Touber</a>
                </div>

                <div>
                    <ul class="nav navbar-nav">
                        <li id="act"><a href="index.php">Home</a></li>
                        <li class="active"><a id="headerMenu"  href="map.php">Map</a></li>
                        <li><a id="headerMenu" href="survey.php">Survey</a></li>
                        <li><a id="headerMenu" href="#">Help</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">

            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="header" class="page-header">Account Summary

                    </h1>
                    <div class="row">
                        <div class="col-lg-12"> 
                            <h4>Tours</h4>
                            
                            <div id="tours">
                                 <p>09/13/2015</p>
                                <p>10/25/2015</p>
                                <p>11/02/2015</p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br/>
                            <h4>Total Donations</h4>
                            <div id="donations">

                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>

    </body>
</html>
