<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Online Railway Booking </title>
    <link rel="shortcut icon" href="images/favicon.png">
    </link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </link>
    <link href="css/bootstrap.css" rel="stylesheet">
    </link>
    <link href="css/Default.css" rel="stylesheet">
    </link>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        var x = (($(window).width()) - 1024) / 2;
        $('.wrap').css("left", x + "px");
    });
    </script>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/man.js"></script>


</head>

<body>

    <div class="wrap">
        <!-- Header -->
        <div class="header">
            <div style="float:left;width:120px;padding: 15px;">
                <img src="images/train.png" />
            </div>
            <div>
                <div style="float:right; font-size:20px;margin-top:20px;">
                    <?php
			 if(isset($_SESSION['name']))	
			 {
			 echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 else
			 {
			 ?>
                    <a href="login1.php" class="btn btn-info">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="signup.php?value=0" class="btn btn-info">Signup</a>
                    <?php } ?>


                </div>
                <div id="heading">
                    <a href="index.php">Indian Railways</a>
                </div>
            </div>
        </div>

        <!-- Navigation bar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="index.php">HOME</a>
                    <a class="brand" href="train.php">FIND TRAIN</a>
                    <a class="brand" href="reservation.php">RESERVATION</a>
                    <a class="brand" href="profile.php">PROFILE</a>
                    <a class="brand" href="booking.php">BOOKING HISTORY</a>
                </div>
            </div>
        </div>
        <div class="span12 well">
            <!-- Photos slider -->
            <div id="myCarousel" class="carousel slide" style="width:100%; float:left;margin-bottom:3px;">
                <div class="carousel-inner">
                    <div class="active item"><img src="images/6.jpg" style="width:100%;height:350px;" /></div>
                    <div class="item"><img src="images/7.jpg" style="width:100%;height:350px;" /> </div>
                    <div class="item"><img src="images/8.jpg" style="width:100%;height:350px;" /></div>
                    <div class="item"><img src="images/9.jpg" style="width:100%;height:350px;" /></div>
                    <div class="item"><img src="images/10.jpg" style="width:100%;height:350px;" /> </div>
                    <div class="item"><img src="images/11.png" style="width:100%;height:350px;" /></div>

                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>

    </div>

</body>

</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>