<!DOCTYPE html>
<html lang="en">
<?php
include 'common/defines/flags.php';
include 'common/defines/topics.php';
include 'common/components/contact.php';
include 'common/components/timepicker.php';
include 'common/components/dragging.php';
?>
<head>
    <meta charset="UTF-8">
    <title>EditProfile</title>
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

    <link href="css/editProfile.css" rel="stylesheet">

    <script src="controller/homeSearch.js"></script>

    <script src="controller/editProfile.js"></script>

    <?php
    librariesDragging();
    librariesTimepicker();
    ?>

</head>
<body>

<?php
include 'common/navbar.php';
?>

<script src="controller/editProfileSearch.js"></script>
<div id="feedback" style="background-color: #ccccff; border: solid 1px black; height: 10rem; margin: 1rem 10rem 1rem 10rem" hidden></div>

<form id="editUserForm"  method="POST" onsubmit="editProfile(this);return false" enctype='multipart/form-data'>
    <script>
        fetch('model/editProfileData.php')
            .then(function(response){
                return response.text();
            })
            .then(function(response) {
                let output = document.getElementById('editUserForm');
                output.innerHTML = response;
                $('#morning1').timepicker({
                    uiLibrary: 'bootstrap4'
                });
                $('#morning2').timepicker({
                    uiLibrary: 'bootstrap4'
                });
                $('#afternoon1').timepicker({
                    uiLibrary: 'bootstrap4'
                });
                $('#afternoon2').timepicker({
                    uiLibrary: 'bootstrap4'
                });
            });
    </script>
</form>

<div id="divSearchEdit" class="container" hidden></div>


<div>
<?php
include 'common/footer.php';
?>
</div>

</body>
</html>