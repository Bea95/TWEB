$("#formSearch").submit(function (e) {
    e.preventDefault();

    let request_method = $(this).attr("method"); //get form GET/POST method
    let form_data = $(this).serialize(); //Encode form elements for submission

    $.ajax({
        type: request_method,
        url : "model/search.php",
        async: false,
        data : form_data
    }).success(function(response){
        $("#editUserForm").attr("hidden", true);
        $("#divSearchEdit").attr("hidden", false);
        $("#divSearchEdit").html(response);
    });
})