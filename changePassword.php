<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="./controller/changePassword.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <style>
    .form-group {
        box-shadow: 10px 10px 5px grey;
        background-color: #fff3a6;
        min-width: 20rem;
        max-width: 50rem;
        padding: 1rem;
    }
    .card-center {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
    }
    .center {
        text-align: center;
    }
    .btn-primary {
        background-color: #F78F1A;
        border-color: #F78F1A
    }
    .btn-primary:hover {
        background-color: #ccccff;
        color: black;
    }
</style>
<body>

<?php
include 'common/navbar.php';
?>


<div id="confirmPassword" style="background-color: #999999">
<form style="padding: 5rem 3rem 5rem 3rem" method="post" onsubmit="confirmPassword(this);return false">
    <div class="form-group card-center">
        <label for="inputPassword">Current Password</label>
        <input id="inputPassword" type="password" class="form-control"  placeholder="Enter Password" required="required">
    </div>
    <div class="center" style="margin-top: 3rem">
        <button id="submitConfirm" type="submit" class="btn btn-primary" required="required">Confirm password</button>
    </div>
</form>
</div>

<div id="changePassword"></div>


<?php
include 'common/footer.php';
?>

</body>
