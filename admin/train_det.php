<?php
session_start();

require '../firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

if(isset($_GET['id'])) {
    $train_id = $_GET['id'];
    $_SESSION['train_id'] = $train_id;
    $result = mysqli_query($conn, "SELECT * FROM train_list WHERE Number ='$train_id'");
    $row = mysqli_fetch_array($result);
} elseif(isset($_GET['Name'])) {
    $Number = $_SESSION['train_id'];
    $Name = $_GET['Name'];
    $Origin = $_GET['Origin'];
    $Destination = $_GET['Destination'];
    $Arrival = $_GET['Arrival'];
    $Departure = $_GET['Departure'];
    $Mon = $_GET['Mon'];
    $Tue = $_GET['Tue'];
    $Wed = $_GET['Wed'];
    $Thu = $_GET['Thu'];
    $Fri = $_GET['Fri'];
    $Sat = $_GET['Sat'];
    $Sun = $_GET['Sun'];
    $A1 = $_GET['1A'];
    $A2 = $_GET['2A'];
    $A3 = $_GET['3A'];
    $SL = $_GET['SL'];
    $General = $_GET['General'];

    $sql = "UPDATE train_list SET Name = '$Name', Origin = '$Origin', Destination = '$Destination', 
            Arrival = '$Arrival', Departure = '$Departure', Mon = '$Mon', Tue = '$Tue', Wed = '$Wed', 
            Thu = '$Thu', Fri = '$Fri', Sat = '$Sat', Sun = '$Sun', 1A = '$A1', 2A = '$A2', 3A = '$A3', 
            SL = '$SL', General = '$General' WHERE Number = '$Number'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script type='text/javascript'> alert('Train Details Updated'); </script>";
        echo "<script type='text/javascript'> window.location.href='train_det.php?id=".$Number."'; </script>";
    } else {
        echo "<script type='text/javascript'> alert('Error occured'); </script>";
    }
} else {
    $train_id = $_SESSION['train_id'];
    $result = mysqli_query($conn, "SELECT * FROM train_list WHERE Number ='$train_id'");
    $row = mysqli_fetch_array($result);
}

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
                            <form action="" id="train_form">
                                <table class="table">
                                    <tr>
                                        <td>Number : </td>
                                        <td style="text-transform:capitalize;"><?php echo $row['Number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name : </td>
                                        <td>
                                            <input type="text" name="Name" id="Name" value="<?php echo $row['Name'];?>"
                                                required disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Origin : </td>
                                        <td>
                                            <input type="text" name="Origin" id="Origin"
                                                value="<?php echo $row['Origin']; ?>" required disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Destination : </td>
                                        <td>
                                            <input type="text" name="Destination" id="Destination"
                                                value="<?php echo $row['Destination']; ?>" required disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Arrival :</td>
                                        <td>
                                            <input required disabled type="time" name="Arrival" id="Arrival"
                                                value="<?php echo $row['Arrival']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Departure : </td>
                                        <td>
                                            <input required disabled type="time" name="Departure" id="Departure"
                                                value="<?php echo $row['Departure']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mon : </td>
                                        <td><select required disabled name="Mon" id="Mon">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Mon'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Mon'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tue : </td>
                                        <td><select required disabled name="Tue" id="Tue">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Tue'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Tue'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Wed : </td>
                                        <td><select required disabled name="Wed" id="Wed">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Wed'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Wed'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thu : </td>
                                        <td><select required disabled name="Thu" id="Thu">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Thu'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Thu'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fri : </td>
                                        <td><select required disabled name="Fri" id="Fri">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Fri'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Fri'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sat : </td>
                                        <td><select required disabled name="Sat" id="Sat">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Sat'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Sat'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sun : </td>
                                        <td><select required disabled name="Sun" id="Sun">
                                                <option value="">Select the trian avaliability </option>
                                                </option>
                                                <option value="Y" <?php if($row['Sun'] == 'Y') echo 'selected'?>>Yes
                                                </option>
                                                <option value="N" <?php if($row['Sun'] == 'N') echo 'selected'?>>No
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1A : </td>
                                        <td>
                                            <input required disabled type="number" name="1A" id="1A"
                                                value="<?php echo $row['1A']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2A : </td>
                                        <td>
                                            <input required disabled type="number" name="2A" id="2A"
                                                value="<?php echo $row['2A']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3A : </td>
                                        <td>
                                            <input required disabled type="number" name="3A" id="3A"
                                                value="<?php echo $row['3A']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SL : </td>
                                        <td>
                                            <input required disabled type="number" name="SL" id="SL"
                                                value="<?php echo $row['SL']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>General : </td>
                                        <td>
                                            <input required disabled type="number" name="General" id="General"
                                                value="<?php echo $row['General']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="button" value="Edit" class="btn btn-warning"
                                                onclick="editTrain();"></td>
                                        <td><input type="button" style="display: none" value="Update" id="update_btn"
                                                class="btn btn-success" onclick="updateTrain();"></td>
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

    <script>
    function editTrain() {
        $("#Name").removeAttr('disabled');
        $("#Origin").removeAttr('disabled');
        $("#Destination").removeAttr('disabled');
        $("#Arrival").removeAttr('disabled');
        $("#Departure").removeAttr('disabled');
        $("#Mon").removeAttr('disabled');
        $("#Tue").removeAttr('disabled');
        $("#Wed").removeAttr('disabled');
        $("#Thu").removeAttr('disabled');
        $("#Fri").removeAttr('disabled');
        $("#Sat").removeAttr('disabled');
        $("#Sun").removeAttr('disabled');
        $("#1A").removeAttr('disabled');
        $("#2A").removeAttr('disabled');
        $("#3A").removeAttr('disabled');
        $("#SL").removeAttr('disabled');
        $("#General").removeAttr('disabled');

        $("#update_btn").show();
    }

    function updateTrain() {
        if ($('#train_form')[0].checkValidity()) {
            $("#train_form").submit();
        } else {
            $('#train_form')[0].reportValidity();
        }
    }
    </script>

</body>

</html>