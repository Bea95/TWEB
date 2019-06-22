<?php
/**
 * Created by PhpStorm.
 * User: owlita
 * Date: 8/06/19
 * Time: 18:05
 */

$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$skype = $_POST['skype'];
$languages = json_decode(stripslashes($_POST['languages']),true);
$topics = json_decode(stripslashes($_POST['topics']),true);
$descr = $_POST['descr'];




$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");
$sqlInsertUser = "INSERT INTO user (email, nickname, password, skype, descr) VALUES ('$email', '$nickname', '$password', '$skype', '$descr');";
$resultInsert = mysqli_query($con, $sqlInsertUser);

mysqli_free_result($resultInsert);

$response = "";
$sqlRecoverId = "SELECT id FROM user WHERE nickname = '$nickname';";
$result = mysqli_query($con, $sqlRecoverId);
if($resultInsert) {
    $user = mysqli_fetch_assoc($result);
    $id = $user['id'];
    mysqli_free_result($result);
    session_start();
    $_SESSION['id'] = $user['id'];
    $_SESSION['nickname'] = $user['nickname'];
    if ($user['photoProfile'] != null) {
        $_SESSION['photoProfile'] = '"data:image/jpeg;base64,' . base64_encode($user['photoProfile']) . '"';
    } else {
        $_SESSION['photoProfile'] = null;
    }

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
    $response = "Success";
}else{
    $n = mysqli_num_rows($result);
    if($n = 1){
        $response = "The nickname already exists";
    }else{
        $sqlRecoverId = "SELECT id FROM user WHERE email = '$email';";
        $result = mysqli_query($con, $sqlRecoverId);
        $n = mysqli_num_rows($result);
        if($n = 1){
            $response = "The email already exists";
        }else{
            $response = "Inexpected Error";
        }
    }
}

mysqli_close($con);
echo json_encode($response);
