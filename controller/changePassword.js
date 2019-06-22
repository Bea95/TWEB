
function confirmPassword(form){
    let password = form[0].value;
    $.ajax({
        type:"POST",
        url: "model/confirmPassword.php",
        async: false,
        data: ({password: password}),
    }).success(function (response){
        let data = JSON.parse(response);
        if(data.response == "Success"){
            $("#inputPassword").attr("disabled", true);
            $("#submitConfirm").attr("disabled", true);
            form.parentNode.nextElementSibling.innerHTML = data.div;
            $("#changeForm").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_again: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: "It isn't a valid email",
                    password: "Please, introduce a password larger than 5",
                    password_again: "Please, introduce the same password as before"
                }
            });
        }else{
            alert("Incorrect password");
        }
    }).error(function () {
        console.log("error");
    });
}




function changePassword(form){
    let password = form[0].value;
    if($("#changeForm").valid()) {
        $.ajax({
            type: "POST",
            url: "model/changePassword.php",
            async: false,
            data: ({password: password}),
        }).success(function (response) {
            console.log(response);
            alert("Password changed");
        }).error(function () {
            console.log("error");
        });
    }
}





