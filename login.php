<?php
session_start();
require 'firstimport.php';

$uname = $_POST['user'];
$pass = $_POST['psd'];

$sql = "SELECT * FROM `users` WHERE f_name='$uname' and password='$pass'";

$result = mysqli_query($conn, $sql) or trigger_error(mysql_error . $sql);

if (mysqli_num_rows($result) < 1) {
    $_SESSION['error'] = "1";
    header("location:login1.php");
} else {
    $_SESSION['name'] = $uname;
    $row = mysqli_fetch_array($result);
    if ($row['is_admin'] == 1) {
        header("location:admin/index.php");
    } else {
        header("location:index.php");
    }
}
