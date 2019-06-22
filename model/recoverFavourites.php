<?php
include '../common/components/contact.php';
include '../common/defines/flags.php';
include '../common/defines/topics.php';



session_start();
$id = $_SESSION['id'];
$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");
$sqlUsers = "SELECT u.id, u.nickname, u.photoProfile FROM favouriteUser f, user u WHERE f.user = $id AND u.id = f.favourite";
$resultUsers = mysqli_query($con, $sqlUsers);
$result = "";
while ($user = mysqli_fetch_array($resultUsers)) {
    $userId = $user['id'];
    $sqlLanguages = "SELECT language FROM speaker WHERE user = $userId";
    $resultLanguages = mysqli_query($con, $sqlLanguages);
    $languages = [];
    while ($language = mysqli_fetch_array($resultLanguages)) {
        array_push($languages, $language['language']);
    }

    mysqli_free_result($resultLanguages);

    $sqlTopics = "SELECT topic FROM amusement WHERE user = $userId";
    $resultTopics = mysqli_query($con, $sqlTopics);
    $topics = [];
    while ($topic = mysqli_fetch_array($resultTopics)) {
        array_push($topics, $topic['topic']);
    }

    mysqli_free_result($resultTopics);

    $result = $result . addCard($user['nickname'], $user['photoProfile'], $languages, $topics);

}
mysqli_free_result($resultUsers);

mysqli_close($con);
echo $result;
?>