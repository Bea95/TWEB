
<?php
include '../common/components/contact.php';
session_start();
$nickname = $_POST['nickname'];
$id = $_SESSION['id'];
$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "tweb");
$sql = "SELECT id FROM user WHERE nickname = '$nickname'";
$resultUser = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($resultUser);
$userId = $user['id'];

$sqlExist = "SELECT rank FROM votes WHERE voter = '$id' AND voted = '$userId'";
$exist = mysqli_query($con, $sqlExist);
$n = mysqli_num_rows($exist);
if( $n == 1 ){
    $sqlVote = "DELETE FROM votes WHERE voter = '$id' AND voted = '$userId'";
    $vote = mysqli_query($con, $sqlVote);
}else{
    $vote = false;
}
mysqli_free_result($exist);


$sqlVotes = "SELECT rank FROM votes WHERE voted = '$userId'";
$resultVotes = mysqli_query($con, $sqlVotes);
$numVotes = mysqli_num_rows($resultVotes);
$meanVotes = 0;
while ($rank = mysqli_fetch_array($resultVotes)) {
    $meanVotes = $meanVotes + $rank['rank'];
}
$meanVotes = $meanVotes / $numVotes;
mysqli_free_result($resultVotes);

mysqli_close($con);

if($vote){
    $response = array("response" => "Success",
        "id" => $id,
        "userId" => $userId,
        "button" => ratingButton($nickname, 0),
        "opinions" => opinions($meanVotes, $numVotes));
}else{
    $response = array("response" => "Error",
        "id" => $id,
        "userId" => $userId);
}

echo json_encode($response);
?>




