
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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


    <link href="common/components/css/rating.css" rel="stylesheet">
    <link href="css/userProfile.css" rel="stylesheet">

    <script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
    <script src="controller/removeFavourite.js"></script>
    <script src="controller/addFavourite.js"></script>


<body>

<?php
include 'common/navbar.php';
?>
<script src="controller/userProfileSearch.js"></script>

<div id="userProfile" class="fixed"></div>
<script>
    fetch('model/seeProfile.php?nickname=<?php print($_GET['nickname']); ?>')
        .then(function(response){
            return response.text();
        })
        .then(function(response) {
            let output = document.getElementById('userProfile');
            output.innerHTML = response;
            $.getScript("controller/voteUser.js");
        });
</script>

<div id="divSearchUserProfile" class="container" hidden></div>


<?php
include 'common/footer.php';
?>

</body>
</html>