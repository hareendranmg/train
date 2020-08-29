<?php
session_start();

require '../firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $mon = $_POST['mon'];
    $tue = $_POST['tue'];
    $wed = $_POST['wed'];
    $thu = $_POST['thu'];
    $fri = $_POST['fri'];
    $sat = $_POST['sat'];
    $sun = $_POST['sun'];
    $a1 = $_POST['1a'];
    $a2 = $_POST['2a'];
    $a3 = $_POST['3a'];
    $sl = $_POST['sl'];
    $gl = $_POST['gl'];

    $sql = "INSERT INTO `train_list`(`Name`, `Origin`, `Destination`, `Arrival`, `Departure`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `Sun`, `1A`, `2A`, `3A`, `SL`, `General`)
            VALUES ('$name','$origin','$destination','$arrival','$departure','$mon','$tue','$wed','$thu','$fri','$sat','$sun','$a1','$a2','$a3','$sl','$gl')";
    $res = mysqli_query($conn, $sql);

    if($res) {
        echo ("<script type='text/javascript'>
                alert('Successfully added new train');
                window.location.href='trains.php';
                </script>");

    } else {
        echo ("<script type='text/javascript'>
                alert('Failed to add a new train');
                </script>");
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Add Train </title>
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
    echo "Welcome," . $_SESSION['name'] . "&nbsp;&nbsp;&nbsp;<a href=\"../logout.php\" class=\"btn btn-info\">Logout</a>";
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
                            <form action="" method="post">
                                <table class="table">
                                    <tr>
                                        <td>Name : </td>
                                        <td style="text-transform:capitalize;"><input required type="text"
                                                placeholder="Train Name" name="name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Origin : </td>
                                        <td><input required type="text" placeholder="Origin" name="origin"></td>
                                    </tr>
                                    <tr>
                                        <td>Destination : </td>
                                        <td><input required type="text" placeholder="Destination" name="destination">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Arrival :</td>
                                        <td><input required type="time" name="arrival"></td>
                                    </tr>
                                    <tr>
                                        <td>Departure : </td>
                                        <td><input required type="time" name="departure"></td>
                                    </tr>
                                    <tr>
                                        <td>Monday : </td>
                                        <td><select required name="mon">
                                                <option value="">Select the trian avaliability </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Tuesday : </td>
                                        <td><select required name="tue">
                                                <option value="">Select the trian avaliability </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday : </td>
                                        <td><select required name="wed">
                                                <option value="">Select the trian avaliability </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Thursday : </td>
                                        <td><select required name="thu">
                                                <option value="">Select the trian avaliability </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Friday : </td>
                                        <td><select required name="fri">
                                                <option value="">Select the trian avaliability </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Saturday : </td>
                                        <td><select required name="sat">
                                                <option value="">Select the trian avaliability </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Sunday : </td>
                                        <td><select required name="sun">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>1A : </td>
                                        <td><input required type="number" name="1a" placeholder="Ticket price"></td>
                                    </tr>
                                    <tr>
                                        <td>2A : </td>
                                        <td><input required type="number" name="2a" placeholder="Ticket price"></td>
                                    </tr>
                                    <tr>
                                        <td>3A : </td>
                                        <td><input required type="number" name="3a" placeholder="Ticket price"></td>
                                    </tr>
                                    <tr>
                                        <td>SL : </td>
                                        <td><input required type="number" name="sl" placeholder="Ticket price"></td>
                                    </tr>
                                    <tr>
                                        <td>General : </td>
                                        <td><input required type="number" name="gl" placeholder="Ticket price"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-success">Add Train</button></td>
                                        <td><button type="reset" class="btn btn-danger">Reset</button></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>
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