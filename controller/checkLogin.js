
function checkLogin (form){
    let email = form[0].value;
    let password = form[1].value;
     $.ajax({
        type:"POST",
        url: "model/checkLogin.php",
        async: false,
        data: ({email: email, password: password}),
    }).success(function (data){
        let response = JSON.parse(data);
        if(response.response == "Success") {
            alert("login success!");
            form.action = "home.php";

        }else{
            console.log(data);
            alert("Wrong user name or password...");
        }
    }).error(function () {
        console.log("error");});
}


