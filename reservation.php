<?php
session_start();
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

require 'firstimport.php';
$doj = '';
$k = 0;
if (isset($_GET['bynum'])) {
	$k = 1;
    $doj = $_GET['date'];
    // $quota=$_POST['quota'];
    $trains_sql = "select * from `train_list` where `Number` = " . $_GET['bynum'];
	$result = mysqli_query($conn, $trains_sql);
	$row = mysqli_fetch_array($result);
	// print_r($trains_sql);
	// print_r($row['Name']);
} else { $k = 0;
    $from = "";
    $to = "";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title> Reservation </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet"></link>
	<link href="css/Default.css" rel="stylesheet"></link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			var x=(($(window).width())-1024)/2;
			$('.wrap').css("left",x+"px");
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
    echo "Welcome, " . $_SESSION['name'] . "&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
} else {
    $_SESSION['error'] = 15;
    header("location:login1.php")
    ?>
				<a href="login.html" class="btn btn-info">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="signup.php" class="btn btn-info">Signup</a>
			<?php }?>

			</div>
			<div id="heading">
				<a href="index.php" >Indian Railways</a>
			</div>
			</div>
		</div>

		<!-- Navigation bar -->
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index.php" >HOME</a>
				<a class="brand" href="train.php" >FIND TRAIN</a>
				<a class="brand " href="reservation.php">RESERVATION</a>
				<a class="brand" href="profile.php">PROFILE</a>
				<a class="brand" href="check_pnr.php">CHECK PNR</a>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- find train with qouta-->
			<div class="span4 well">
			<form method="get" action="reservation.php">
			<table class="table">
				<tr>
					<th style="border-top:0px;"><label> From <label></th>
					<td>
						<select name="bynum">
						<option value="">Select Train</option>
						<?php
$trains_sql = "select * from train_list";
$trains_res = mysqli_query($conn, $trains_sql);
while ($train_row = mysqli_fetch_array($trains_res)) {
    ?>
								<option value="<?php echo $train_row['Number'] ?>"><?php echo $train_row['Name'] ?></option>
							<?php
}
?>
						</select>
					</td>
				</tr>
				<tr>
					<th style="border-top:0px;"><label> Date<label></th>
					<td style="border-top:0px;"><input type="date" class="input-block-level input-medium" name="date" max="<?php echo date('Y-m-d', time() + 60 * 60 * 24 * 90); ?>" min="<?php echo date('Y-m-d') ?>" value="<?php if (isset($_POST['date'])) {echo $_POST['date'];} else {echo date('Y-m-d');}?>"> </td>
				</tr>
				<tr>
					<td style="border-top:0px;"><input class="btn btn-info" type="submit" value="OK"></td>
					<td style="border-top:0px;"><a href="reservation.php" class="btn btn-info" type="reset" value="Reset">Reset</a></td>
				</tr>
			</table>
			</form>
			</div>

		<!-- display train -->
			<div class="span8 well">
				<div class="display" style="height:30px;">
				<table class="table">
				<tr>
					<th style="width:80px;border-top:0px;"> Train No.</th>
					<th style="width:270px;border-top:0px;"> Train Name </th>
					<th style="width:65px;border-top:0px;"> Orig. </th>
					<th style="width:55px;border-top:0px;"> Des. </th>
					<th style="width:70px;border-top:0px;"> Arr. </th>
					<th style="width:80px;border-top:0px;"> Dep. </th>
					<th style="width:200px;border-top:0px;">Class</th>
				</tr>
				</table>
				</div>
				<div class="display" style="margin-top:0px;overflow:auto;">
				<table class="table">

				<?php
if ($k == 1) {
	print_r($row['name']);
        ?>
					<tr class="text-error">
					<td style="width:80px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:270px;"> <?php echo $row['Name']; ?> </a></td>
					<td style="width:65px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:80px;"> <?php echo $row['Departure']; ?> </td>
					<td style="width:200px;">  
						<a class="text-error" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $row['Origin'] ?>&tostn=<?php echo $row['Destination'] ?>&doj=<?php echo $doj ?>&class=<?php echo "1A";?>"><b>1A</b></a> 
						<a class="text-error" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $row['Origin'] ?>&tostn=<?php echo $row['Destination'] ?>&doj=<?php echo $doj ?>&class=<?php echo "2A";?>"><b>2A</b></a>
						<a class="text-error" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $row['Origin'] ?>&tostn=<?php echo $row['Destination'] ?>&doj=<?php echo $doj ?>&class=<?php echo "3A";?>"><b>3A</b></a> 
						<a class="text-error" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $row['Origin'] ?>&tostn=<?php echo $row['Destination'] ?>&doj=<?php echo $doj ?>&class=<?php echo "SL";?>"><b>SL</b></a> 
						<a class="text-error" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $row['Origin'] ?>&tostn=<?php echo $row['Destination'] ?>&doj=<?php echo $doj ?>&class=<?php echo "GL";?>"><b>General</b></a> 
						
					</td>
					</tr>
					<?php
} else {
    echo "<div class=\"alert alert-error\"  style=\"margin:100px 180px;\"> please search the train.. </div>";
}
?>
				</table>
				</div>
			</div>
		</div>

	</div>
</body>
</html>