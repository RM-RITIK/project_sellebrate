<?php

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$staffId = mysqli_real_escape_string($link, $_REQUEST['staffId']);
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

$sql = "INSERT INTO add_staff (staff_id, name , email, phone, address, city, state, role, jDate, totalWorkingHours, salary, active) VALUES ('$staffId', '$name', '$email', 
'$phone', '$address', '$city', '$state', '$role', '$jdate', '$time', '$salary', '$active')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("Location: http://192.168.64.2/project/info.php"); 
exit();
 
// Close connection
mysqli_close($link);
?>