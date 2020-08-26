<?php
session_start();

require '../firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

$train_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM train_list WHERE Number ='$train_id'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>

<head>
    <title> Train Details </title>
    <link rel="shortcut icon" href="../images/favicon.png">
    </link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    </link>
    <link href="../css/Default.css" rel="stylesheet">
    </link>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        var x = (($(window).width()) - 1024) / 2;
        $('.wrap').css("left", x + "px");
    });
    </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/man.js"></script>

</head>

<body>

    <div class="wrap">
        <!-- Header -->
        <div class="header">
            <div style="float:left;width:120px;padding: 15px;">
                <img src="../images/train.png" />
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
                    <a href="../index.php">Indian Railways</a>
                </div>
            </div>
        </div>
        <!-- Navigation bar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="index.php">HOME</a>
                    <a class="brand" href="trains.php">TRAINS</a>
                    <a class="brand" href="bookings.php">BOOKINGS</a>
                    <a class="brand" href="users.php">USERS</a>
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
                                    <td>Number : </td>
                                    <td style="text-transform:capitalize;"><?php echo $row['Number']; ?></td>
                                </tr>
                                <tr>
                                    <td>Name : </td>
                                    <td style="text-transform:capitalize;"><?php echo $row['Name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Origin : </td>
                                    <td><?php echo $row['Origin']; ?></td>
                                </tr>
                                <tr>
                                    <td>Destination : </td>
                                    <td><?php echo $row['Destination']; ?></td>
                                </tr>
                                <tr>
                                    <td> Arrival :</td>
                                    <td><?php echo $row['Arrival']; ?></td>
                                </tr>
                                <tr>
                                    <td>Departure : </td>
                                    <td><?php echo $row['Departure']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mon : </td>
                                    <td><?php echo $row['Mon']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tue : </td>
                                    <td><?php echo $row['Tue']; ?></td>
                                </tr>
                                <tr>
                                    <td>Wed : </td>
                                    <td><?php echo $row['Wed']; ?></td>
                                </tr>
                                <tr>
                                    <td>Thu : </td>
                                    <td><?php echo $row['Thu']; ?></td>
                                </tr>
                                <tr>
                                    <td>Fri : </td>
                                    <td><?php echo $row['Fri']; ?></td>
                                </tr>
                                <tr>
                                    <td>Sat : </td>
                                    <td><?php echo $row['Sat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Sun : </td>
                                    <td><?php echo $row['Sun']; ?></td>
                                </tr>
                                <tr>
                                    <td>1A : </td>
                                    <td><?php echo $row['1A']; ?></td>
                                </tr>
                                <tr>
                                    <td>2A : </td>
                                    <td><?php echo $row['2A']; ?></td>
                                </tr>
                                <tr>
                                    <td>3A : </td>
                                    <td><?php echo $row['3A']; ?></td>
                                </tr>
                                <tr>
                                    <td>SL : </td>
                                    <td><?php echo $row['SL']; ?></td>
                                </tr>
                                <tr>
                                    <td>General : </td>
                                    <td><?php echo $row['General']; ?></td>
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