
<?php
include '../common/components/contact.php';
session_start();
$nickname = $_POST['nickname'];
$rank = $_POST['rank'];
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
$operation = "";
if( $n == 1 ){
    $sqlVote = "UPDATE votes SET rank = '$rank' WHERE voter = '$id' AND voted = '$userId'";
    $operation = "Update";
}else{
    $sqlVote = "INSERT INTO votes (voter, voted, rank) VALUES ('$id','$userId','$rank')";
    $operation = "Insert";
}
$vote = mysqli_query($con, $sqlVote);
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
        "operation" => $operation,
        "button" => ratingButton($nickname, 1),
        "opinions" => opinions($meanVotes, $numVotes));
}else{
    $response = array("response" => "Error",
        "id" => $id,
        "userId" => $userId,
        "operation => $operation");
}

echo json_encode($response);
?>




