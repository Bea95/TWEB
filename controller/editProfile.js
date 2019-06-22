let uploadPhoto = "";
let editPhoto = 0;
function previewFile(){
    var preview = document.querySelector('img'); //selects the query named img
    var file    = document.querySelector('input[type=file]').files[0]; //sames as here
    var reader  = new FileReader();

    reader.onloadend = function () {
        $("#editPhotoProfile").fadeIn("fast").attr("src", reader.result);
        uploadPhoto = reader.result;
        editPhoto = 1;
    }

    if (file) {
        reader.readAsDataURL(file); //reads the data as a URL
    } else {
        preview.src = "";
    }
}

function editProfile (form) {
    console.log(form);
    var form_data = new FormData();
    form_data.append('nickname', form[2].value);
    form_data.append('skype', form[3].value);
    form_data.append('morning1', form[4].value);
    form_data.append('morning2', form[6].value);
    form_data.append('afternoon1', form[8].value);
    form_data.append('afternoon2', form[10].value);
    form_data.append('descr', form[12].value);
    form_data.append('editPhoto', editPhoto);
    form_data.append('uploadPhoto', uploadPhoto);



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

    let photoProfile = $('#inputPhoto').prop("files")[0];
    form_data.append('file', photoProfile);

    $.ajax({
        type:"POST",
        url: "model/editProfilePost.php",
        async: false,
        processData: false,
        contentType: false,
        data:form_data,
        enctype: 'multipart/form-data',
    }).done(function (response){
        let data = JSON.parse(response);
        $("#feedback").attr('hidden', false);
        $("#feedback").html(data);
    });
}

