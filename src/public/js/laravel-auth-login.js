$(document).ready(function(){
    $('#login-frm').on('submit', function(){
        var crypt_sha512 = CryptoJS.SHA512($('#password').val()).toString();
        var key = $('meta[name="csrf-token"]').attr('content');
        var hash = CryptoJS.HmacSHA512(crypt_sha512, key).toString();
        $('#password').val(hash);
    });
});