<?php

require 'connection.php';

session_start();
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($link, "SELECT * FROM users WHERE email = '$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['email'];
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
    die();
 }

?>