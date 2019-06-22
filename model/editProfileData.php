<?php
include '../common/components/contact.php';
include '../common/defines/flags.php';
include '../common/defines/topics.php';
include '../common/components/dragging.php';
include '../common/components/timepicker.php';

librariesTimepicker();
librariesDragging();

session_start();

$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");

session_start();
$id = $_SESSION['id'];
$photoProfile = $_SESSION['photoProfile'];
$sqlUser = "SELECT nickname, email, skype, descr, morning1, morning2, afternoon1, afternoon2 FROM user WHERE id = '$id'";
$resultUser = mysqli_query($con, $sqlUser);
$user = mysqli_fetch_assoc($resultUser);
$nickname = $user['nickname'];
$email = $user['email'];
$skype = $user['skype'];
$descr = $user['descr'];
$morning1 = $user['morning1'];
$morning2 = $user['morning2'];
if ($morning1 == null || $morning2 == null) {
    $morning1 = "";
    $morning2 = "";
} else {
    $morning1 = date('H:i', strtotime($user['morning1']));
    $morning2 = date('H:i', strtotime($user['morning2']));
}
$afternoon1 = $user['afternoon1'];
$afternoon2 = $user['afternoon2'];
if ($afternoon1 == null || $afternoon2 == null) {
    $afternoon1 = "";
    $afternoon2 = "";
} else {
    $afternoon1 = date('H:i', strtotime($user['afternoon1']));
    $afternoon2 = date('H:i', strtotime($user['afternoon2']));
}
$scheduler = [$morning1, $morning2, $afternoon1, $afternoon2];

mysqli_free_result($resultUser);

$sqlLanguages = "SELECT language FROM speaker WHERE user = $id";
$resultLanguages = mysqli_query($con, $sqlLanguages);
$languages = [];
while ($language = mysqli_fetch_array($resultLanguages)) {
    array_push($languages, constant($language['language']));
}

mysqli_free_result($resultLanguages);

$sqlTopics = "SELECT topic FROM amusement WHERE user = $id";
$resultTopics = mysqli_query($con, $sqlTopics);
$topics = [];
while ($topic = mysqli_fetch_array($resultTopics)) {
    array_push($topics, constant($topic['topic']));
}

mysqli_free_result($resultTopics);

mysqli_close($con);

print(editSection($nickname, $photoProfile, $email, $skype, $morning1, $morning2, $afternoon1, $afternoon2, $languages, $topics, $descr));
