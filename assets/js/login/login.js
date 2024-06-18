$(document).ready(function () {
    $('#Login').on('click', function () {
        $.ajax({
            url: base_url + 'login/service/login_service/login',
            type: "POST",
            dataType: "JSON",
            data: {
                username: $('#username').val(),
                password: $('#password').val(),
            },
            success: function(response) {
                if (response.has_error) {
                    toastr.error(response.error_message);
                } else {
                    if(response.a==0){
                        window.location = base_url + "login/retype_password";
                    }else{
                    if(response.usertype == 0){
                        window.location = base_url + "mobile?ID=" + response.ID;
                    }
                    else{
                        window.location = base_url + "dashboard";
                    }}
                }
            }
        });
        // window.location = base_url + "dashboard";
    });

    $('#password').on('keyup', function (e) {
        if (e.keyCode == 13)
            $('#Login').click();
    });

    $('#change_pass').on('click', function () {
        if($('#password').val() != $('#password2').val()){
            alert("Password does not match. Please try again.");
        }
        $.ajax({
            url: base_url + 'login/service/login_service/change_pass',
            type: "POST",
            dataType: "JSON",
            data: {
                password: $('#password').val(),
            },
            success: function(response) {
                if (response.has_error) {
                    toastr.error(response.error_message);
                } else {
                    if(response.usertype == 0){
                        window.location = base_url + "mobile?ID=" + response.ID;
                    }
                    else{
                        window.location = base_url + "dashboard";
                    }
                }
            }
        });
        // window.location = base_url + "dashboard";
    });
});