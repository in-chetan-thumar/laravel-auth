$(document).ready(function(){
    $('#reset-frm').on('submit', function(){
		if ($('#reset-frm').valid()) {
			if ($('#password').val() != '') {
                if (/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{6,}$/.test($('#password').val())) {
                    $('#password-error1').hide();
                    $('#password').val(CryptoJS.SHA512($('#password').val()));
	        		$('#password-confirm').val(CryptoJS.SHA512($('#password-confirm').val()));
                } else {
                    return false;
                }
            }	        
		}else{
            return false;
        }
    });
});