$(document).ready(function () {
    $('#password_update_frm').on('submit', function () {
        if ($('#password_update_frm').valid()) {
            if ($('#old_password').val() != '') {
                var crypt_sha512 = CryptoJS.SHA512($('#old_password').val()).toString();
                var key = $('meta[name="csrf-token"]').attr('content');                
                var hash = CryptoJS.HmacSHA512(crypt_sha512, key).toString();
                $('#old_password').val(hash);
            }
            if ($('#password').val() != '') {
                if (/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{6,}$/.test($('#password').val())) {
                    $('#password-error1').hide();
                    $('#password').val(CryptoJS.SHA512($('#password').val()));
                } else {
                    return false;
                }
                //$('#password').val(CryptoJS.SHA512($('#password').val()));
            }
            if ($('#password_confirmation').val() != '') {
                $('#password_confirmation').val(CryptoJS.SHA512($('#password_confirmation').val()));
            }
        }
    });
});