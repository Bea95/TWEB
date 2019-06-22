<?php
session_start();
?>

<nav class="navbar" style="background-color: #F78F1A">
    <nav class="navbar" style="border-color: black; border: 3px solid">
        <a class="navbar-brand" href="home.php">
            <img src="https://pngimage.net/wp-content/uploads/2018/05/example-logo-png-1.png" width="110px"
                 style="padding-left: 0">
        </a>
        <form id="formSearch" class="form-inline" method="post">
<!--            <input id="inputNickname" name="nickname" aria-label="Search" class="form-control mr-sm-2" style="background-color: #fff3a6; margin-right: -1rem" placeholder="Search" type="search">-->
            <select id="selectLanguage" name="language" class="custom-select" style="background-color: #fff3a6">
                <option value="">-- Language --</option>
                <option value="SPANISH">Spanish</option>
                <option value="ITALIAN">Italian</option>
                <option value="GERMAN">German</option>
                <option value="JAPANESE">Japanese</option>
                <option value="FRENCH">French</option>
                <option value="ENGLISH_UK">English UK</option>
                <option value="ENGLISH_USA">English USA</option>
            </select>
            <select id="selectTopic" name="topic" class="custom-select" style="background-color: #fff3a6">
                <option value="">-- Topic --</option>
                <option value="ANIMALS">Animals</option>
                <option value="ART">Art</option>
                <option value="COMPUTER">Computer</option>
                <option value="LITERATURE">Literature</option>
                <option value="NATURE">Nature</option>
                <option value="SPORT">Sport</option>
                <option value="TRAVEL">Travel</option>
            </select>

            <button name="button" class="btn btn-outline-success my-2 my-sm-0" style="border-color: black; color: black"
                    type="submit">Search
            </button>
        </form>
    </nav>
    <nav class="navbar">
        <a class="nav-link active" href="userProfile.php?nickname=<?php print($_SESSION["nickname"])?>" style="color: black">
            <img class="mr-3"
                 height="30rem"
                 src=
                <?php
                if ($_SESSION["photoProfile"] == null){
                    print("https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg");

                }else{
                    //echo '"data:image/jpeg;base64,'.base64_encode( $_SESSION["photoProfile"] ).'"';
                    print($_SESSION["photoProfile"]);
                }
                ?>
                 style="border-radius: 50px" width="30rem">
            <?php print($_SESSION["nickname"])?>
        </a>
        <a class="nav-link active" href="home.php" style="color: black">
            <img id="homeIcon" alt="home icon"
                 height="23rem"
                 src="https://image.flaticon.com/icons/png/512/61/61972.png">
        </a>
        <div class="nav-item dropdown">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
               href="#" role="button" style="color: black"></a>
            <div class="dropdown-menu dropdown-menu-right" style="background-color: #fff3a6">
                <a class="dropdown-item" href="userProfile.php?nickname=<?php print($_SESSION["nickname"])?>">My profile</a>
                <a class="dropdown-item" href="./changePassword.php">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Log out</a>
            </div>
        </div>
    </nav>
</nav>

