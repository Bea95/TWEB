
<?php
$email = $_POST['email'];
$password = md5($_POST['password']);
?>

<?php
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"tweb");
//$sql="SELECT id, nickname, photoProfile FROM user WHERE email = '$email' AND password = '$password'";
$sql="SELECT id, nickname, photoProfile FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($con,$sql);

$test = false;
if($result){
    $n = mysqli_num_rows($result);
    if ($n == 1){
        $test = true;
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nickname'] = $user['nickname'];
        if($user['photoProfile'] != null){
            $_SESSION['photoProfile'] = '"data:image/jpeg;base64,'.base64_encode($user['photoProfile']).'"';
        }else{
            $_SESSION['photoProfile'] = null;

        }
        $response = array("response" => "Success",
                          "test" => true);
    }
}
if(!test){
    $response = array("response" => "Invalid",
        "msg" => "Invalid email or password");
}

mysqli_free_result($result);
mysqli_close($con);



echo json_encode($response);


?>

