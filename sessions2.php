<?php
session_start();
include("connection.php");

if (!isset($_SESSION['login_user'])) {
   header("location: adminlogin.php");
   exit;
}

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($con, "SELECT last_name, role FROM admin WHERE email = '$user_check'");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['last_name'];
$role = isset($row['role']) ? $row['role'] : '';

?>
