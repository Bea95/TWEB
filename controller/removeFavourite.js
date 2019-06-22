function removeFavourite (button, nickname){
    $.ajax({
        type:"POST",
        url: "model/removeFavourite.php",
        async: false,
        data: ({nickname: nickname}),
    }).success(function (response){
        let data = JSON.parse(response);
        if (data.response == "Success"){
            console.log('User deleted:', data);
            alert("User deleted");
            button.parentNode.innerHTML = data.button;
        }
        else{
            console.log("Wrong user deletion...", response);
            alert("Wrong user deletion...");
        }
    }).error(error => console.error('Error:', error));
}



