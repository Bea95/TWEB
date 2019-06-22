<?php
session_start();
function correctPassword(){
    ob_start();
    ?>
    <form id="changeForm" style="padding: 5rem 3rem 5rem 3rem" method="post" onsubmit="changePassword(this); return false;">
        <div class="form-group card-center">
            <label for="password">New Password</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group card-center">
            <label for="password_again">Repeat password</label>
            <input id="password_again" name="password_again" type="password" class="form-control" placeholder="Enter Password"></div>
        <div class="center" style="margin-top: 3rem">
            <button id="submitChange" type="submit" class="btn btn-primary">Change password</button>
        </div>
    </form>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

$id = $_SESSION['id'];
$password = md5($_POST['password']);
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"tweb");
$sql = "SELECT id FROM user WHERE id='" . $id . "' AND password = '$password';";
$result = mysqli_query($con,$sql);

if($result) {
    $n = mysqli_num_rows($result);
    if ($n == 1) {
        $response = array("response" => "Success", "div" => correctPassword());
    } else {
        $response = array("response" => "Error", "n" => $n, "id" => $id, "password" => $password, "slq" => $sql);
    }
}else{
    $response = array("response" => "Error2", "result" => $result);
}
mysqli_close($con);

print(json_encode($response));
?>