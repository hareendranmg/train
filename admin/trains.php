<?php
session_start();

require '../firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/adminlte.min.css"> -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/Default.css" rel="stylesheet">
    <title>Trains</title>
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
    ?>
                    <a href="login1.php" class="btn btn-info">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="signup.php?value=0" class="btn btn-info">Signup</a>
                    <?php }?>


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
                    <a class="brand" href="trains.php">TRAINS</a>
                    <a class="brand" href="bookings.php">BOOKINGS</a>
                    <a class="brand" href="users.php">USERS</a>
                </div>
            </div>
        </div>

        <div class="span12 well">
            <div style="border-bottom: 3px solid #ddd; display: flex; justify-content: center;">
                <div style="flex: 5" align="center">
                    <h2>Trains</h2>
                </div>
                <div style="flex: 1">
                    <a href="add_train.php" class="btn btn-primary">Add a train</a>
                </div>
            </div>
            <br>

            <div>
                <table class="table">
                    <tr>
                        <th style="width:100px;border-top:0px;">Train Number</th>
                        <th style="width:100px;border-top:0px;">Name</th>
                        <th style="width:100px;border-top:0px;">Origin</th>
                        <th style="width:100px;border-top:0px;">Destination</th>
                        <th style="width:100px;border-top:0px;">Details</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM train_list";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                    <tr class="text-error">
                        <th style="width:100px;"> <?php echo $row['Number']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Name']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Origin']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['Destination']; ?> </th>
                        <th style="width:100px;"> <a href="train_det.php?id=<?php echo $row['Number']; ?>"
                                class="btn btn-info">View Details</a> </th>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        var x = (($(window).width()) - 1024) / 2;
        $('.wrap').css("left", x + "px");
    });
    </script>
</body>

</html>