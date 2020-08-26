<?php
session_start();
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");

}
$tbl_name = "users"; // Table name
$name = $_SESSION['name'];

require 'firstimport.php';

mysqli_select_db($conn, "$db_name") or die("cannot select db");

$result = mysqli_query($conn, "SELECT * FROM $tbl_name WHERE f_name='$name'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>

<head>
    <title> Profile </title>
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
        <!-- Header -->
        <div class="header">
            <div style="float:left;width:120px;padding: 15px;">
                <img src="images/train.png" />
            </div>
            <div>
                <div style="float:right; font-size:20px;margin-top:20px;">
                    <?php
if (isset($_SESSION['name'])) {
    echo "Welcome," . $_SESSION['name'] . "&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
} else {
    $_SESSION['error'] = 15;
    header("location:login1.php");
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

        <div class="span12 well pass1">
            <table style="width:100%;">
                <tr>
                    <td>
                        <div class="span8" style="float:left;width:80%;">
                            <table class="table">
                                <tr>
                                    <td>First Name : </td>
                                    <td style="text-transform:capitalize;"><?php echo $row['f_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name : </td>
                                    <td style="text-transform:capitalize;"><?php echo $row['l_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>E-Mail : </td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Dob : </td>
                                    <td><?php echo $row['dob']; ?></td>
                                </tr>
                                <tr>
                                    <td> Gender :</td>
                                    <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile No : </td>
                                    <td><?php echo $row['mobile']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>

            </table>
        </div>

    </div>

    <?php mysqli_close($conn);

if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] == 6) {
        echo "<script>document.getElementById(\"chang\").style.display=\"\";</script>";
    }
}
?>

</body>

</html>