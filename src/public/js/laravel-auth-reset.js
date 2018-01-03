$(document).ready(function(){
    $('#reset-frm').on('submit', function(){
        $('#password').val(CryptoJS.SHA512($('#password').val()));
        $('#password-confirm').val(CryptoJS.SHA512($('#password-confirm').val()));
    });
});