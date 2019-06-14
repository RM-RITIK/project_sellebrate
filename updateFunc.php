<?php

require 'connection.php';

$id = $_GET['staff_id'];
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$state = mysqli_real_escape_string($link, $_REQUEST['state']);
$role = mysqli_real_escape_string($link, $_REQUEST['role']);
$active = mysqli_real_escape_string($link, $_REQUEST['active']);
$jdate = mysqli_real_escape_string($link, $_REQUEST['jdate']);
$time = mysqli_real_escape_string($link, $_REQUEST['time']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$sql = "UPDATE staff SET name = '$name', email = '$email', phone = '$phone', address = '$address', city = '$city', state = '$state', role = '$role', jDate = '$jdate', totalWorkingHours = '$time', salary = '$salary', active = '$active'  WHERE staff_id = '$id' ";

if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("Location: info.php"); 
exit();
 
// Close connection
mysqli_close($link);

?>