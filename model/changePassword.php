<?php
session_start();
$id = $_SESSION['id'];
$password = md5($_POST['password']);

$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"tweb");
$sqlChangePassword = "UPDATE user SET password='$password' WHERE id= '$id'";
$password = mysqli_query($con, $sqlChangePassword);

mysqli_close($con);

print_r($password);
?>