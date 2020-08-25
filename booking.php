<?php

session_start();
require 'firstimport.php';
if (isset($_SESSION['name'])) {} else {
    header("location:login1.php");
}

$tbl_name = "booking";

$uname = $_SESSION['name'];
$num = $_GET['tno'];
$seat = $_GET['selct'];
$fromstn = $_GET['fromstn'];
$tostn = $_GET['tostn'];
$doj = $_GET['doj'];
$dob = date('Y-m-d H:i:s');

$name = $_GET['name1'];
$age = $_GET['age1'];
$sex = $_GET['sex1'];
$name2 = $_GET['name2'];
$age2 = $_GET['age2'];
$sex2 = $_GET['sex2'];

$pnr = 'PNR' . random_int(1000, 9999);

if ((empty($name) || empty($age))) {
    $flag = 0;
} else {
    $flag = 1;
    $status = "Waiting";
    $sql = "INSERT INTO $tbl_name(pnr,uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
		VALUES ('$pnr', '$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
    $result = $conn->query($sql);
}

if ((empty($name2) || empty($age2))) {
	if($flag == 0) {
		$flag = 0;
	}
} else {
    $flag = 1;
    $sql = "INSERT INTO $tbl_name(pnr, uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
		VALUES ('$pnr', '$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name2','$age2','$sex2','$status')";
    $result = $conn->query($sql);
}

if ($flag == 1) {
    header("location:display.php?tno='$num'&& doj='$doj'&& seat='$seat'");
} else {
    echo ("<script type='text/javascript'>
				alert('Please fill minimum one passenger details');
		  </script>");
    echo ("<script type='text/javascript'>
				window.location.href='reser.php?status=failed';
				// window.location.href='reservation.php?status=failed';
		   </script>");

}
