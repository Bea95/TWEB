function addFavourite (button, nickname){
    $.ajax({
        type:"POST",
        url: "model/addFavourite.php",
        async: false,
        data: ({nickname: nickname}),
    }).success(function (response){
        let data = JSON.parse(response);
        if (data.response == "Success"){
            console.log('User added:', data);
            alert("User added");
            button.parentNode.innerHTML = data.button;
        }
        else{
            console.log("Wrong user addition...", response);
            alert("Wrong user addition...");
        }
    }).error(error => console.error('Error:', error));
}

