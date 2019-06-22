$(document).ready(function (){
    $("#signUpForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            nickname: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            password_again: {
                equalTo: "#password"
            }
        },
        messages: {
            email: "The email introduced is invalid",
            nickname: "The nickname is invalid or lower than 5 characters",
            password: "Please, introduce a password larger than 5",
            password_again: "Please, introduce the same password as before"
        }
    });
});

function signUp(form) {
    if($("#signUpForm").valid()) {
        let form_data = new FormData();
        form_data.append('nickname', form[0].value);
        form_data.append('email', form[1].value);
        form_data.append('password', form[2].value);
        form_data.append('skype', form[4].value);
        form_data.append('descr', form[5].value);

        let languages = [];
        for(let i=0; i< $("#userDivFlag")[0]['children']['length']; i++){
            languages.push($("#userDivFlag")[0]['children'][i]['id']);
        }
        form_data.append('languages', JSON.stringify(languages));

        let topics = [];
        for(let i=0; i< $("#userDivTopic")[0]['children']['length']; i++){
            topics.push($("#userDivTopic")[0]['children'][i]['id']);
        }
        form_data.append('topics', JSON.stringify(topics));


        $.ajax({
            type: "POST",
            url: "model/signUp.php",
            async: false,
            data: form_data,
            processData: false,
            contentType: false,
        }).done(function (response) {
            let data = JSON.parse(response);
            $("#feedback").attr('hidden', false);
            $("#feedback").html(data);
            form.action = "home.php";
        });
    }
}