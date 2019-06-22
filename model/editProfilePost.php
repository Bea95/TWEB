<?php
/**
 * Created by PhpStorm.
 * User: owlita
 * Date: 8/06/19
 * Time: 18:05
 */

session_start();
$id = $_SESSION['id'];
$nickname = $_POST['nickname'];
$error = 0;
if ( 0 < $_FILES['file']['error'] ) {
    $error = 1;
}
else {
    move_uploaded_file($_FILES['file']['tmp_name'], 'model/editProfilePost.php/' . $_FILES['file']['name']);
}
$skype = $_POST['skype'];
$morning1 = hasValue($_POST['morning1']);
$morning2 = hasValue($_POST['morning2']);
$afternoon1 = hasValue($_POST['afternoon1']);
$afternoon2 = hasValue($_POST['afternoon2']);
$descr = $_POST['descr'];
$languages = json_decode(stripslashes($_POST['languages']),true);
$topics = json_decode(stripslashes($_POST['topics']),true);


$uploadPhoto = $_POST['uploadPhoto'];
$editPhoto = $_POST['editPhoto'];



$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");
$sqlEditUser = "UPDATE user SET nickname='$nickname',";
$photoProfile = addslashes(file_get_contents($_FILES['file']['tmp_name']));

if($editPhoto){
    $sqlEditUser = $sqlEditUser . " photoProfile = '" . $photoProfile . "',";
}

$sqlEditUser = $sqlEditUser ." skype = '$skype', descr = '$descr', morning1 = $morning1, morning2 = $morning2, afternoon1 = $afternoon1, afternoon2 = $afternoon2 WHERE id = '$id'";
$result = mysqli_query($con, $sqlEditUser);

if($result) {
    if ($editPhoto) {
        $_SESSION['photoProfile'] = $uploadPhoto;
    }

    $deleteLanguage = "DELETE FROM speaker WHERE user = '$id'";
    mysqli_query($con, $deleteLanguage);
    $insertLanguage = "INSERT INTO speaker(user,language) VALUES ";

    // loop over the array
    for ($i = 0; $i < sizeof($languages); $i++) {
        $language = $languages[$i];
        // add to the query
        $insertLanguage .= "('" . $id . "','" . $language . "')";
        // if there is another array member, add a comma
        if ($i < sizeof($languages) - 1) {
            $insertLanguage .= ",";
        }
    }
    mysqli_query($con, $insertLanguage);

    $deleteTopic = "DELETE FROM amusement WHERE user = '$id'";
    mysqli_query($con, $deleteTopic);
    $insertTopic = "INSERT INTO amusement(user,topic) VALUES ";

    // loop over the array
    for ($i = 0; $i < sizeof($topics); $i++) {
        $topic = $topics[$i];
        // add to the query
        $insertTopic .= "('" . $id . "','" . $topic . "')";
        // if there is another array member, add a comma
        if ($i < sizeof($topics) - 1) {
            $insertTopic .= ",";
        }
    }
    mysqli_query($con, $insertTopic);
}

$response = "";

if ($result) {
    $response = "Changes made";
} else {
    $sqlRecoverId = "SELECT id FROM user WHERE nickname = '$nickname';";
    $resultId = mysqli_query($con, $sqlRecoverId);
    $n = mysqli_num_rows($resultId);
    if ($n == 1) {
        $response = "The nickname already exists";
    } else {
        $response = "Inexpected Error";
    }
}



mysqli_close($con);

echo json_encode($response);

function hasValue($value){
    if($value == "" || $value == null){
        return "null";
    }else{
        return "'" . $value . "'";
    }
}
