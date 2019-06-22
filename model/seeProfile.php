<?php
include '../common/components/contact.php';
include '../common/defines/flags.php';
include '../common/defines/topics.php';

$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");

session_start();
$myId = $_SESSION['id'];
$nickname = $_GET['nickname'];
$myProfile = false;
if($nickname == $_SESSION['nickname']){
    $myProfile = true;
}

$sqlUser = "SELECT id, photoProfile, skype, descr, morning1, morning2, afternoon1, afternoon2 FROM user WHERE nickname = '$nickname'";
$resultUser = mysqli_query($con, $sqlUser);
$user = mysqli_fetch_assoc($resultUser);
$id = $user['id'];
$photoProfile = $user['photoProfile'];
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
    array_push($languages, $language['language']);
}

mysqli_free_result($resultLanguages);

$sqlTopics = "SELECT topic FROM amusement WHERE user = $id";
$resultTopics = mysqli_query($con, $sqlTopics);
$topics = [];
while ($topic = mysqli_fetch_array($resultTopics)) {
    array_push($topics, $topic['topic']);
}

mysqli_free_result($resultTopics);


$sqlVotes = "SELECT rank FROM votes WHERE voted = '$id'";
$resultVotes = mysqli_query($con, $sqlVotes);
$numVotes = mysqli_num_rows($resultVotes);
$meanVotes = 0;
while ($rank = mysqli_fetch_array($resultVotes)) {
    $meanVotes = $meanVotes + $rank['rank'];
}
$meanVotes = $meanVotes / $numVotes;
mysqli_free_result($resultVotes);

$myVote = 0;

if(!$myProfile){

    $sqlVote = "SELECT rank FROM votes WHERE voter='$myId' AND voted = '$id'";
    $resultVote = mysqli_query($con, $sqlVote);
    $hasVoted = mysqli_num_rows($resultVote);
    $vote = mysqli_fetch_assoc($resultVote);
    if($hasVoted != 0){
        $myVote = $vote['rank'];
    }
    mysqli_free_result($resultVote);

    $sqlFavourite = "SELECT user FROM favouriteUser WHERE user = '$myId' AND favourite = '$id'";
    $resultFavourite = mysqli_query($con, $sqlFavourite);
    $favourite = mysqli_num_rows($resultFavourite);

    mysqli_free_result($resultFavourite);
}

$result = seeProfile($nickname, $photoProfile, $meanVotes, $numVotes, $languages, $topics, $scheduler, $descr);
if(!$myProfile) {
    $result = $result . favouriteDiv($nickname, $favourite);
    $result = $result . ratingDiv($nickname, $myVote);
    $result = $result . skype($favourite, $skype);
}else{
    $result = $result . editButton();
}
$result = $result . endProfile();

mysqli_close($con);
print $result;
?>
