<!DOCTYPE HTML>
<html>
<?php
include 'common/defines/flags.php';
include 'common/defines/topics.php';
include 'common/components/dragging.php';
include 'common/components/timepicker.php';
include 'common/components/contact.php';
?>

<?php
session_start();
if($_SESSION['id']){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'home.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
?>
<div id="feedback" style="background-color: #fff3a6; border: solid 1px black; height: 10rem; margin: 1rem 10rem 1rem 10rem" hidden></div>

<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="common/components/css/dragging.css" rel="stylesheet">
    <link href="css/signUp.css" rel="stylesheet">
    <script src="common/components/js/dragging.js"></script>
    <?php librariesTimepicker(); ?>


<body style="background-color: #ccccff">
<form id="signUpForm" style="padding: 5rem 3rem 5rem 3rem" method="post" onsubmit="signUp(this); return false;">
    <div class="form-group card-center">
        <label for="nickname">Nickname</label>
        <input id="nickname" name="nickname" type="text" class="form-control" placeholder="Enter nickname">
        <small id="nicknameHelp" class="form-text text-muted">Your friends recognize you by the nickname</small>
    </div>
    <div class="form-group card-center">
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">You can't change it on the future</small>
    </div>
    <div class="form-group card-center">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password">
    </div>
    <div class="form-group card-center">
        <label for="password_again">Reapeat password</label>
        <input id="password_again" name="password_again" type="password" class="form-control"  placeholder="Enter Password">
    </div>
    <div class="form-group card-center">
        <label for="inputNameSkype">Skype user's name</label>
        <input id="inputNameSkype" type="text" class="form-control" placeholder="Enter Skype user's name">
        <small id="skypeHelp" class="form-text text-muted">This information is for people can keep in contact to you by skype. The pattern must be "live:[YOUR SKYPE NAME]"</small>
    </div>

    <?php
        sectionDiv("User languages", "Container of other languages", "userDivFlag", "divFlag", [], disjunctionSet(0,[]), 'language');
    ?>
    <?php
        sectionDiv("User topics", "Container of other topics", "userDivTopic", "divTopic", [], disjunctionSet(1,[]), 'topic');
    ?>

    <div class="form-group card-center" style="margin-top: 1rem">
        <label for="inputDescription">Description</label>
        <textarea id="inputDescription" class="form-control" rows="3"></textarea>
    </div>

    <div class="center" style="margin-top: 3rem">
        <button type="submit" class="btn btn-primary" style="background-color: #F78F1A; border-color: #F78F1A">Submit</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="controller/signUp.js"></script>


</body>
</html>
