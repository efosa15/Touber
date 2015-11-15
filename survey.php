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


	<div class="container" id="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-11">
                <h1 id="header" class="page-header">Please, answer carefully
                    
                </h1>
            </div>
            <div class="row">
                <div class="col-lg-11"> 
                    
                    <p id="par">Here you can leave a review to the person who went on a tour with you. You may also be able to retrieve 
                    ratings of people giving tours! But we need to know if you are offering tours or seeking for one beforehand.</p>
                    <div id="explaination">
                        <b>Were you ... </b>
                        
                         <input id="radiobtn" type="radio" name="occupation" value="student">Touring
                         <input id="radiobtn" type="radio" name="occupation" value="other">Seeking a tour
                         
                    </div>
                     <script>
                             $(document).on('change', 'input[name="occupation"]:radio', function(){
                             document.cookie="user=" + $(this).val();
                             document.getElementById("action").hidden = false;
                             
                             });
                         </script>
                    <div id="action" hidden>
                        <b>Do you want to...</b>
                        <input id="radiobtn" type="radio" name="actionToBePerformed" value="checkRating">Check rating
                        <input id="radiobtn" type="radio" name="actionToBePerformed" value="leaveRating">Leave rating
                    </div>
                         
                         <script>
                             $(document).on('change', 'input[name="actionToBePerformed"]:radio', function(){
                             document.cookie="action=" + $(this).val();
                             document.getElementById("explaination").hidden = true;
                             location.reload();
                         });
                         </script>
                         
                         <?php
                         if (isset($_COOKIE["user"])){
                             if ( $_COOKIE["user"] == 'student'){
                             if ( $_COOKIE["action"] == 'leaveRating'){
                                 echo "<p><b>You cannot leave a review nor rating if you are giving tours</b></p>";
                                 
                             }else{
                                 echo "<div id='formCheck'>
                                      retrieve ALL data from DB of requested user (all ratings,comments and name)
                                      </div>";
                             }
                         
                            }else{
                             if ( $_COOKIE["action"] == 'leaveRating'){
                                 echo"<div class='row'><div class='col-lg-12'><form id='commentForm' action='' method='post'>"
                                   . "<div class='row'><div class='col-lg-12'>Person name : <input type='text' name='pName'/></div></div>"
                                   . "<div class='row'><div class='col-lg-12'>Rating (from 0 to 5) : <input type='number' max='5' min='0' name='rating'/></div></div>"
                                   . "<div class='row'><div class='col-lg-12'>Comment : <textarea name='comment' rows='5' cols='40'>If you have any, it'll be highly appreciated</textarea></div></div>"
                                   . "<div class='row'><div class='col-lg-12'><input type='submit' value='Send!'></div></div>"
                                   . "</form></div></div>";
                            }else{
                                 echo"<div class='row'><div class='col-lg-12'><form id='displayOneRatingForm' action='' method='post'>"
                                   . "<div class='row'><div class='col-lg-12'>Person name? : <input type='text' name='pName'/></div></div>"
                                   . "<div class='row'><div class='col-lg-12'><input type='submit' value='Send!'></div></div>"
                                   . "</form></div></div>";
                             }
                         }
                         }
                        
                         ?>
                        
                         
                        
                    
                   
              </div>
                   
            </div>
            
           
        </div>
     </div>

</body>
</html>