<?php
include '../common/components/contact.php';
include '../common/defines/flags.php';
include '../common/defines/topics.php';

session_start();
$id = $_SESSION['id'];
$language = $_POST['language'];
$topic = $_POST['topic'];

$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");

$sqlUser = "";
"SELECT u.id, u.nickname, u.photoProfile FROM user u";
if ($language != "" || $topic != "") {
    $sqlUser .= "SELECT u.id, u.nickname, u.photoProfile FROM user u";
    if ($language != "") {
        $sqlUser .= ", speaker l";
    }
    if ($topic != "") {
        $sqlUser .= ", amusement t";
    }
    $sqlUser .= " WHERE ";
    if ($language != "") {
        $sqlUser .= "u.id=l.user AND l.language='$language'";
    }
    if ($language != "" && $topic != "") {
        $sqlUser .= " AND ";
    }
    if ($topic != "") {
        $sqlUser .= "u.id=t.user AND t.topic='$topic'";
    }
} else {
    $sqlUser .= "SELECT id, nickname, photoProfile FROM user";
}
$sqlUser .= ";";

$resultUsers = mysqli_query($con, $sqlUser);
$result = "";

while ($user = mysqli_fetch_array($resultUsers)) {
    $userId = $user['id'];
    $sqlLanguages = "SELECT language FROM speaker WHERE user = $userId";
    $resultLanguages = mysqli_query($con, $sqlLanguages);
    $languages = [];
    while ($language = mysqli_fetch_array($resultLanguages)) {
        array_push($languages, $language['language']);
    }

    mysqli_free_result($resulLanguages);

    $sqlTopics = "SELECT topic FROM amusement WHERE user = $userId";
    $resultTopics = mysqli_query($con, $sqlTopics);
    $topics = [];
    while ($topic = mysqli_fetch_array($resultTopics)) {
        array_push($topics, $topic['topic']);
    }

    mysqli_free_result($resultTopics);

    $result = $result . addCard($user['nickname'], $user['photoProfile'], $languages, $topics);
}
mysqli_close($con);
echo $result;
?>

