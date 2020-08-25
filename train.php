<?php
session_start();
require 'firstimport.php';

$k = 0;
if (isset($_GET['bynum'])) {
	$num = $_GET['bynum'];
	$k = 1;

    $sql = "SELECT * FROM `train_list` WHERE `Number` = ".$num;
	$result = mysqli_query($conn, $sql);
	// print_r($sql); exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title> Find Train </title>
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
						}
						?>

                </div>
                <div id="heading">
                    <a href="index.php">Indian Railways</a>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="index.php">HOME</a>
                    <a class="brand" href="train.php">FIND TRAIN</a>
                    <a class="brand" href="reservation.php">RESERVATION</a>
                    <a class="brand" href="profile.php">PROFILE</a>
                    <a class="brand" href="check_pnr.php">CHECK PNR</a>
                </div>
            </div>
        </div>

        <div class="span12 well" id="boxh">

            <form style="margin:0px;" method="get">
                <table class="table" style="margin-bottom:0px;">
                    <tr>
                        <th style="border-top:0px;"><label><b>Search Train</label></th>
                        <td style="border-top:0px;">
                            <select name="bynum">
                                <option value="">Select Train</option>
                                <?php
									$trains_sql = "select * from train_list";
									$trains_res = mysqli_query($conn, $trains_sql);
									while ($row = mysqli_fetch_array($trains_res)) {
										?>
                                		<option value="<?php echo $row['Number'] ?>"><?php echo $row['Name'] ?></option>
									<?php
										}
									?>
                            </select>
                        </td>
                        <td style="border-top:0px;"><input class="btn btn-info" type="submit" value="Find"> </td>
                        <td style="border-top:0px;"><a href="train.php" class="btn btn-info" type="reset"
                                value="Reset">Reset</a></td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- display result -->
        <div class="span12 well">
            <div class="display" style="height:30px;">
                <table class="table" border="5px">
                    <tr>
                        <th style="width:70px;border-top:0px;"> Train No.</th>
                        <th style="width:210px;border-top:0px;"> Train Name </th>
                        <th style="width:65px;border-top:0px;"> Orig. </th>
                        <th style="width:55px;border-top:0px;"> Des. </th>
                        <th style="width:60px;border-top:0px;"> Arr. </th>
                        <th style="width:65px;border-top:0px;"> Dep. </th>
                        <th style="width:20px;border-top:0px;"> M </th>
                        <th style="width:25px;border-top:0px;"> T </th>
                        <th style="width:29px;border-top:0px;"> W </th>
                        <th style="width:25px;border-top:0px;"> T </th>
                        <th style="width:25px;border-top:0px;"> F </th>
                        <th style="width:25px;border-top:0px;"> S </th>
                        <th style="border-top:0px;">
                            <font color=red> S </font>
                        </th>
                    </tr>
                </table>
            </div>
            <div class="display" style="margin-top:0px;overflow:auto;">
                <table class="table">
                    <?php
					if ($k == 1) {
						while ($row = mysqli_fetch_array($result)) {
							?>
                    <tr class="text-info">
                        <td style="width:80px;"> <?php echo $row['Number']; ?> </td>
                        <td style="width:210px;"> <?php echo $row['Name']; ?> </td>
                        <td style="width:65px;"> <?php echo $row['Origin']; ?> </td>
                        <td style="width:60px;"> <?php echo $row['Destination']; ?> </td>
                        <td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
                        <td style="width:55px;"> <?php echo $row['Departure']; ?> </td>
                        <td style="width:20p;"> <?php echo $row['Mon']; ?> </td>
                        <td style="width:25px;"> <?php echo $row['Tue']; ?> </td>
                        <td style="width:29px;"> <?php echo $row['Wed']; ?> </td>
                        <td style="width:25px;"> <?php echo $row['Thu']; ?> </td>
                        <td style="width:25px;"> <?php echo $row['Fri']; ?> </td>
                        <td style="width:25px;"> <?php echo $row['Sat']; ?> </td>
                        <td> <?php echo $row['Sun']; ?> </td>
                    </tr>
                    <?php
						}
					} else {
						echo "<div class=\"alert alert-error\"  style=\"margin:100px 350px;\"> please search the train.. </div>";
					}
						mysqli_close($conn);
						?>
                </table>
            </div>
        </div>

    </div>
</body>

</html>