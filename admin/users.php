<?php
session_start();

require '../firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users where user_id='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo ("<script type='text/javascript'>
                alert('Successfully Deleted the user');
                </script>");
    } else {
        echo ("<script type='text/javascript'>
                    alert('Failed to delete the user');
                    </script>");
    }

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
    <title>Users</title>
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
                    <h2>Users</h2>
                </div>
            </div>
            <br>

            <div>
                <table class="table">
                    <tr>
                        <th style="width:100px;border-top:0px;">First Name</th>
                        <th style="width:100px;border-top:0px;">Last Name</th>
                        <th style="width:100px;border-top:0px;">Email</th>
                        <th style="width:100px;border-top:0px;">Gender</th>
                        <th style="width:100px;border-top:0px;">DOB</th>
                        <th style="width:100px;border-top:0px;">Mobile</th>
                        <th style="width:100px;border-top:0px;">Action</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM users";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                    <tr class="text-error">
                        <th style="width:100px;"> <?php echo $row['f_name']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['l_name']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['email']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['gender']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['dob']; ?> </th>
                        <th style="width:100px;"> <?php echo $row['mobile']; ?> </th>
                        <th style="width:100px;"> <a href="users.php?id=<?php echo $row['user_id']; ?>"
                                class="btn btn-info">Delete</a> </th>
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