function addErrorData(element, error) {
    element.parent().addClass("error");
    element.after("<div class='error-data'>" + error + "</div>");
}

function doValidation(input) {
    //Remove old errors
    $(input).parent().removeClass('error');
    $(input).next('.error-data').remove();
    if ($(input).hasClass('required') && !validateRequired($(input).val())) {
        addErrorData($(input), "This is a required field");
    }
    if ($(input).hasClass('email') && !validateEmail($($(input)).val())) {
        addErrorData($(input), "Invalid email address provided");
    }
    if ($(input).hasClass('pass2')) {
        var result = validatePasswords($(input).val());
        if (result != true) {
            addErrorData($(input), result);
        }
    }
	
    
}



function validateRequired(value) {
    if (value == "") return false;
    return true;
}

function validateEmail(value) {
    if (value != "") {
        return /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i.test(value);
    }
    return true;
}

function validatePasswords(value) {
    var password = $('.pass1').val();
    if (value == "") {
        return "Both passwords are required";
    } else if (value != password) {
        return "Passwords do not match";
    }
    return true;
}





$(document).ready(function(){
//------------------------------------------------------------------	
	$('#register').hide();
	
	$('#start_register').click(function(){
		$('.big_container').hide();
		$('#register').toggle('slow');
		
	}); 
	
	$('#stop_register').click(function(){
		$('.big_container').toggle('slow');
		$('#register').hide();
		
	});
//-------------------------------------------------------------------------------	
	$('#confirm_register_form').click(function(event){
        //Prevent form submission
        event.preventDefault();
        var inputs = $('input');
		
        for (var i = 0; i < inputs.length; i++) {
            var input = inputs[i];
            doValidation(input);
        }
		
		if ($('.error-data').length == 0) {
            //No errors, submit the form
            $('#reg_form').submit();
        }
    });
	
    $('input').on("keyup", function(){
        doValidation($(this));
    });
	
	$('input').mouseup(function(){
        doValidation($(this));
    });
	
	

     
});
