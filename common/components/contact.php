<?php

function addCard($nickname, $photoProfile, $languages, $topics)
{
    ob_start();
    ?>
    <div class="col-sm" style="max-width: 20rem">
        <div class="card shadow" style="width: 18rem; margin-top: 1rem">
            <img class="align-self-center mr-3"
                 height="100rem"
                 src=
                 <?php
                 if ($photoProfile == null){
                     print("https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg");

                 }else{
                     echo '"data:image/jpeg;base64,'.base64_encode( $photoProfile ).'"';
                 }
                 ?>
                  style = "border-radius: 50px; margin-top: 1rem" width="100rem">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; font-weight: bold">
                    <?php
                    print($nickname);
                    ?>
                </h4>
                <?php
                if (count($languages)>0)
                {
                    ?>
                    <hr>

                    <p class="card-title" style="text-align: center; font-style: italic">LANGUAGUES</p>
                    <?php
                    showImages($languages)
                    ?>
                <?php
                }

                if (count($topics)>0)
                {
                    ?>
                    <hr>

                    <p class="card-title" style="text-align: center; font-style: italic">TOPICS</p>
                    <?php
                    showImages($topics)
                    ?>
                <?php
                }
                ?>
                <div style="text-align: center">
                    <a href="userProfile.php?nickname=<?php print($nickname); ?>" class="btn btn-primary" style="margin-top: 2rem; background-color: #333333; color: white; border-color: #F78F1A; font-weight: bold">View Details</a>
                </div>
            </div>
        </div>
    </div>
<?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function seeProfile($nickname, $photoProfile, $stars, $votes, $languages, $topics, $schedule, $description)
{
    ob_start();
    ?>
    <div class="card card-center" style="width: 80rem; margin-top: 1rem; background-color: #fff3a6">
        <img class="align-self-center mr-3"
             height="200rem"
             src=
             <?php
             if ($photoProfile == null){
                 print("https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg");

             }else{
                 echo '"data:image/jpeg;base64,'.base64_encode( $photoProfile ).'"';
             }
             ?>
             style = "border-radius: 100px; margin-top: 3rem; margin-left: 1rem" width="200rem">
        <div class="card-body">
            <h1 class="card-title" style="text-align: center; font-weight: bold">
                <?php
                print($nickname);
                ?>
            </h1>
            <div id="OpinionsDiv" class="center">
                <?php print(opinions($stars, $votes)); ?>
            </div>

            <div class="card-body center card-center " style="display:flex; flex-direction:row; flex-wrap: wrap">
                <div class="card card-center orange shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Languages</h5>
                        <hr class="orange">
                        <?php
                        showImages($languages)
                        ?>
                    </div>
                </div>
                <div class="card card-center orange shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Topics</h5>
                        <hr class="orange">
                        <?php
                        showImages($topics)
                        ?>
                    </div>
                </div>
                <?php
                printSchedule($schedule[0], $schedule[1], $schedule[2], $schedule[3]);
                ?>
            </div>

            <div class="card card-center shadow" style="max-width: 68rem; background-color: #ccccff">
                <div class="card-body">
                    <h5 class="card-title center" style="font-weight: bold">Description</h5>
                    <hr style="border-color: black">
                    <?php
                    print($description);
                    ?>
                </div>
            </div>
<?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function opinions($stars, $votes){
    ob_start();
    $i = 0;
    for ($i; $i<$stars; $i++){
        ?>
        <span class="fa fa-star checked"></span>
        <?php
    }

    for ($i; $i<5; $i++){
        ?>
        <span class="fa fa-star"></span>
        <?php
    }
    ?>
    <span>(<?php print($votes); ?> opinions)</span>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function addImages($image)
{
    ?>
    <img class="align-self-center mr-3"
        height="40rem"
        src=
        <?php
        echo '"' . constant($image) . '" ';
        ?>
        style="border-radius: 50px" width="40rem">
        <?php
    }

function showImages($table)
{
    ?>
    <div class="container" style="display:flex; flex-direction:row; flex-wrap: wrap">
        <div class="col-sm">
            <?php
            for ($i = 0, $size = count($table); $i < $size; ++$i){
                addImages($table[$i]);
            }
            ?>
        </div>
    </div>
    <?php
}

function printSchedule($morning1, $morning2, $afternoon1, $afternoon2){
    ?>
    <?php
    if ($morning1 != null && $morning2!=null && $morning1 != "" && $morning2 != "")
    {
        $morning=true;
    }else{
        $morning=false;
    };
    if ($afternoon1 != null && $afternoon2!=null){
        $afternoon=true;
    }else{
        $afternoon=false;
    };
    ?>
    <div class="card card-center orange shadow"  style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Schedule</h5>
            <hr class="orange">
            <div style="text-align: left">
                <?php
                if($morning)
                {
                    ?>
                    <p class="bold">Morning</p>
                    <p style="text-align: right">De
                        <?php
                        print($morning1);
                        ?>
                        a
                        <?php
                        print($morning2);
                        ?>
                    </p>
                    <?php
                }

                if($morning && $afternoon)
                {
                    ?>
                    <hr>
                    <?php
                }
                if($afternoon) {
                    ?>
                    <p class="bold">Afternoon</p>
                    <p style="text-align: right">De
                        <?php
                        print($afternoon1);
                        ?>
                        a
                        <?php
                        print($afternoon2);
                        ?>
                    </p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}

function favouriteDiv($nickname, $favourite){
    ob_start();
    ?>
    <div class="center" style="margin-top: 3rem">
        <?php
        print(favouriteButton($nickname, $favourite));
        ?>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function favouriteButton($nickname, $favourite){
    ob_start();
        if(!$favourite){
            ?>
            <button class="btn btn-default" onclick="addFavourite(this, '<?php print($nickname); ?>')" style="background-color: white; border-color: #F78F1A; font-weight: bold">
                <img src="img/buttons/favourite.png" width="40"/>
                &nbsp ADD FAVOURITE
            </button>
            <?php
        }

        else{
            ?>
            <button class="btn btn-default" onclick="removeFavourite(this,'<?php print($nickname); ?>')" style="background-color: white; border-color: #F78F1A; font-weight: bold">
                <img src="img/buttons/delete_friend.png" width="40"/>
                &nbsp REMOVE FAVOURITE
            </button>
            <?php
        }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function ratingDiv($nickname, $vote){
    ob_start();
    ?>
    <div class="center">
        <div class="center" style="margin-top: 1rem" >
                <?php
                include 'rating.php';
                ratingHTML($vote);
                ?>
        </div>
        <div class="center">
        <?php
        print(ratingButton($nickname,$vote));
        ?>
        </div>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function ratingButton($nickname, $vote){
    ob_start();
    if($vote == 0){     //No votes
        ?>
        <button id="VoteInsertButton" class="btn btn-default" onclick="voteUser(this, '<?php print($nickname); ?>')" style="background-color: #F78F1A; border-color: black; color: white; font-weight: bold" disabled>
            VOTE
        </button>
        <?php
    }else {             //Had voted already
        ?>
        <button id="VoteUpdateButton" class="btn btn-default" onclick="voteUser(this, '<?php print($nickname); ?>')" style="background-color: #ccccff; border-color: black; font-weight: bold" disabled>
            CHANGE VOTE
        </button>
        <button class="btn btn-default" onclick="removeVoteUser(this, '<?php print($nickname); ?>')" style="background-color: #F78F1A; border-color: black; color: white; font-weight: bold">
            REMOVE VOTE
        </button>
        <?php
    }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function skype($favourite, $skype){
    ob_start();
    if ($favourite && $skype) {
        ?>
        <div class="skype-button bubble" data-contact-id="<?php print($skype);?>"></div>
        <?php
    }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function editButton(){
    ob_start();
    ?>
    <div class="center" style="margin-top: 3rem">
        <button class="btn btn-default" style="background-color: white; border-color: #F78F1A; font-weight: bold">
            <a href="./editProfile.php">
            <img src="img/buttons/edit.png" width="40"/>
            &nbsp EDIT PROFILE
        </button>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function editSection($nickname, $photoProfile, $email, $skype, $morning1, $morning2, $afternoon1, $afternoon2, $languages, $topics, $desc){
    ob_start();
    ?>

    <span class="flex">
        <div class="card card-center responsive"
             style="margin-top: 1rem; background-color: #fff3a6">

            <img id="editPhotoProfile"
                 class="align-self-center mr-3"
                 height="200rem"
                 src=
                 <?php
                 if ($photoProfile == null){
                     print("https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg");

                 }else{
                    //echo '"data:image/jpeg;base64,'.base64_encode($photoProfile).'"';
                    print($photoProfile);

                 }
                 ?>
                  style= "border-radius: 100px; object-fit: fill; margin-top: 3rem; margin-left: 1rem" width="200rem">

            <div class="form-group card-center" style="margin-top: 1rem">
                <label for="inputPhoto" style="font-weight: bold">Upload profile photo:&nbsp</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="4294967295"/>
                <input type="file" name="userPhoto" id="inputPhoto" onchange="previewFile()">
            </div>
            <div class="form-group card-center" style="width: 30rem">
                <label for="inputNickname" style="font-weight: bold; font-size: 2rem">Nickname</label>
                <input type="text" class="form-control" id="inputNickname" placeholder="Enter nickname" value="<?php print($nickname); ?>" style="font-weight: bold; font-size: 2rem; height: 3rem">
            </div>
             <div class="form-group card-center" style="width: 30rem">
                <label for="inputSkypeName" style="font-weight: bold">Skype name</label>
                <input type="text" class="form-control" id="inputSkypeName" placeholder="Enter skype name" value="<?php print($skype)?>">
            </div>
        </div
    </span>

    <div id="inputScheduler" class="form-group card-center" style="border: 1px solid; border-color: #F78F1A; margin-top: 1.3rem; margin-bottom:3rem;">
        <label style="padding-top: 1rem; padding-left: 1rem; font-weight: bold" for="inputScheduler">Scheduler</label>
        <div style="padding-left: 3rem; padding-right: 1rem">
            <?php
            timepicker("morning1", "Schedule Morning Start", $morning1);
            timepicker("morning2", "Schedule Morning Finish", $morning2);
            ?>
        </div>
        <hr>
        <div style="padding-left: 3rem;padding-bottom: 1rem">
            <?php
            timepicker("afternoon1", "Schedule Afternoon Start", $afternoon1);
            timepicker("afternoon2", "Schedule Afternoon Finish", $afternoon2);
            ?>
        </div>
    </div>


    <div class="card-body center card-center">
        <?php
        sectionDiv("User languages", "Container of other languages", "userDivFlag", "divFlag", $languages, disjunctionSet(0, $languages), 'language');
        ?>

        <?php
        sectionDiv("User topics", "Container of other topics", "userDivTopic", "divTopic", $topics, disjunctionSet(1, $topics), 'topic');
        ?>

    </div>

    <div class="card card-center responsive"
         style="background-color: #ccccff; padding: 1rem 1rem 1rem 1rem">
            <h5 class="card-title center" style="font-weight: bold">Description</h5>
            <hr style="border-color: black">
            <textarea class="form-control" id="inputDescription" rows="3"><?php print($desc); ?></textarea>
        </div>
    </div>

    <div class="card-center" style="margin-bottom: 5rem; margin-top: 1rem">
        <button type="submit" class="btn btn-primary card-center" style="background-color: #F78F1A; border-color: #F78F1A">Save Changes</button>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}


function endProfile(){
    ob_start();
    ?>
    </div>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}
?>


