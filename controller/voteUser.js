let rank = 0;

$(':radio').change(function() {
    rank = this.value;
    $('#VoteInsertButton').attr('disabled', false);
    $('#VoteUpdateButton').attr('disabled', false);

});

function voteUser (button, nickname){
    $.ajax({
        type:"POST",
        url: "model/voteUser.php",
        async: false,
        data: ({nickname: nickname, rank:rank}),
    }).success(function (response){
        let data = JSON.parse(response);
        if (data.response == "Success"){
            if(data.operation == "Insert"){
                alert("Voting made ");
            }else{
                console.log('Change made:', data);
                alert("Change made ");
            }
            button.parentNode.innerHTML = data.button;
            $('#OpinionsDiv').html(data.opinions);
        }else{
            console.log("Voting error...", response);
            alert("Voting error...");
        }
    }).error(function () {
        console.log("error");
    });
}

function removeVoteUser (button, nickname){
    $.ajax({
        type:"POST",
        url: "model/removeVoteUser.php",
        async: false,
        data: ({nickname: nickname}),
    }).success(function (response){
        let data = JSON.parse(response);
        if (data.response == "Success"){
            alert("Voting removed ");
            button.parentNode.innerHTML = data.button;
            uncheck();
            $('#OpinionsDiv').html(data.opinions);


        }else{
            console.log("Voting remove error...", response);
            alert("Voting remove error...");
        }
    }).error(function () {
        console.log("error");
    });
}

function uncheck(){
    $(':radio').attr('checked',false);
}


