<?php
session_start();

require 'firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");

}
$tbl_name = "booking";
if (isset($_GET['pnr'])) {
    $pnr = $_GET['pnr'];
    $sql = "SELECT Tnumber,doj,Name,Age,Sex,Status,DOB,class FROM $tbl_name WHERE pnr='$pnr'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        $pnr = "";
        echo "<script type='text/javascript'> alert('Invalid PNR Number'); </script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title> Reservation </title>
    <link rel="shortcut icon" href="images/favicon.png">
    </link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
        <div class="header">
            <div style="float:left;width:120px;padding: 15px;">
                <img src="images/train.png" />
            </div>
            <div>
                <div style="float:right; font-size:20px;margin-top:20px;">
                    <?php
						if (isset($_SESSION['name'])) {
							echo "Welcome," . $_SESSION['name'] . "&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
						}
						?>

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
                    <a class="brand" href="check_pnr.php">CHECK PNR</a> 
                    <a class="brand" href="display.php">BOOKING HISTORY</a>
                </div>
            </div>
        </div>

        <div class="span12 well">
            <form action="" method="get">
                <div align="center">
                    <input type="text" name="pnr" id="pnr" style="margin-top: 10px;" placeholder="Enter the pnr number">
                    <button type="submit" class="btn btn-primary ">Check</button>
                </div>
            </form>
        </div>

        <div class="span12 well">
            <div align="center" style="border-bottom: 3px solid #ddd;">
                <h2>PNR Details </h2>
            </div>
            <br>

            <div>
                <table class="table">
                    <col width="90">
                    <col width="90">
                    <col width="90">
                    <col width="110">
                    <col width="90">
                    <col width="90">
                    <col width="90">
                    <col width="90">
                    <tr>
                        <th style="width:10px;border-top:0px;">PNR</th>
                        <th style="width:100px;border-top:0px;">Train Number</th>
                        <th style="width:100px;border-top:0px;">Date Of Journey</th>
                        <th style="width:100px;border-top:0px;">Name</th>
                        <th style="width:100px;border-top:0px;">Age</th>
                        <th style="width:100px;border-top:0px;">Sex</th>
                        <th style="width:100px;border-top:0px;">Status</th>
                        <th style="width:100px;border-top:0px;">Date of Booking</th>
                        <th style="width:100px;border-top:0px;">Class</th>
                    </tr>
                    <tr class="text-error">
                        <th style="width:10px;"> <?php echo $pnr; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Tnumber']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['doj']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Name']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Age']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Sex']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Status']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['DOB']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['class']; ?> </th>
                    </tr>
                </table>
            </div>
</body>

</html>