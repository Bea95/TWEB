
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
    $add = false;
    if($userId!=null){
        $sqlUser = "INSERT INTO favouriteUser (user, favourite) VALUES ('$id','$userId')";
        $add = mysqli_query($con, $sqlUser);
    }

    mysqli_free_result($resultUser);

    mysqli_close($con);

    if($add) {
        $response = array("response" => "Success",
            "id" => $id,
            "userId" => $userId,
            "button" => favouriteButton($nickname, true));
    }else{
        $response = array("response" => "Error",
            "id" => $id,
            "nickname" => $nickname,
            "userId" => $userId,
            "post"=> $_POST);
    }


    print json_encode($response);
?>




