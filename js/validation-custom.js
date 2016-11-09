$(document).ready(function(){
	
	// SignUp Form Validation
	$("#phone_no_form").validate({		
		rules:{
			required:{
				required:true
			},
			mobile_1234:{
				required:true
				
			},
			
		},
		errorClass: "help-inline text-danger",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.form-group').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-error');
			$(element).parents('.form-group').addClass('has-success');
		}
	});
	
	$("#contact_id").validate({		
		rules:{
			required:{
				required:true
			},
			emp_name:{
				required:true,				
				number:true,
				min:10
				
			},
			
		},
		errorClass: "help-inline text-danger",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.form-group').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-error');
			$(element).parents('.form-group').addClass('has-success');
		}
	});

});