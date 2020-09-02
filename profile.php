<?php
require 'firstimport.php';
session_start();
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}
$tbl_name = "users"; // Table name
$name = $_SESSION['name'];

if(isset($_GET['f_name'])) {
    $f_name = $_GET['f_name'];
    $l_name = $_GET['l_name'];
    $email = $_GET['email'];
    $dob = $_GET['dob'];
    $gender = $_GET['gender'];
    $mobile = $_GET['mobile'];

    $sql = "UPDATE users SET f_name = '$f_name', l_name = '$l_name', email = '$email', gender = '$gender', mobile = '$mobile'
            WHERE f_name = '$name'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script type='text/javascript'> alert('Profile Updated'); </script>";
        $_SESSION['name'] = $f_name;
        echo "<script type='text/javascript'> window.location.href='profile.php'; </script>";
    } else {
        echo "<script type='text/javascript'> alert('Error occured'); </script>";
    }
}

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
            <form action="" id="profile_form">
                <table style="width:100%;">
                    <tr>
                        <td>
                            <div class="span8" style="float:left;width:80%;">
                                <table class="table">
                                    <tr>
                                        <td>First Name : </td>
                                        <td style="text-transform:capitalize;">
                                            <input type="text" readonly name="f_name" id="f_name"
                                                value="<?php echo $row['f_name']; ?>" required >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last Name : </td>
                                        <td style="text-transform:capitalize;">
                                            <input type="text" readonly name="l_name" id="l_name"
                                                value="<?php echo $row['l_name']; ?>"required >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail : </td>
                                        <td>
                                            <input type="text" readonly name="email" id="email"
                                                value="<?php echo $row['email']; ?>" required >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dob : </td>
                                        <td>
                                            <input type="date" readonly name="dob" id="dob"
                                                value="<?php echo $row['dob']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Gender :</td>
                                        <td>
                                            <input type="text" readonly name="gender" id="gender"
                                                value="<?php echo $row['gender']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No : </td>
                                        <td>
                                            <input type="text" readonly name="mobile" id="mobile"
                                                value="<?php echo $row['mobile']; ?>" pattern="([6789][0-9]{9})"
                                                minlength="10" maxlength="10" required>
                                                <p>Please enter a valid mobile number starts with 6,7,8 or 9</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="button" value="Edit" class="btn btn-warning"
                                                onclick="editProfile();"></td>
                                        <td><input type="button" style="display: none" value="Update" id="update_btn"
                                                class="btn btn-success" onclick="updateProfile();"></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                </table>
            </form>
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

<script>
function editProfile() {
    $("#f_name").removeAttr('readonly');
    $("#l_name").removeAttr('readonly');
    $("#email").removeAttr('readonly');
    // $("#dob").removeAttr('readonly');
    // $("#gender").removeAttr('readonly');
    $("#mobile").removeAttr('readonly');

    $("#update_btn").show();
}

function updateProfile() {
    if ($('#profile_form')[0].checkValidity()) {
        $("#profile_form").submit();
    } else {
        $('#profile_form')[0].reportValidity();
    }
}
</script>

</html>