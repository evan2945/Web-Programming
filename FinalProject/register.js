$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});


$().ready(function() {
	$("#newRegister").validate(
	      {
	        rules: 
	        {
	          new_email: 
	          {
	            required: true,
	            email: true
	          },
	          new_first: 
	          {
	            required: true
	          },
	          new_last: 
	          {
	            required: true
	          },
	          new_user: {
	          	required: true
	          },
	          new_passwd: {
	          	required: true,
	          	minlength: 6
	          },
	          check_passwd: {
	          	required: true,
	          	minlength: 6,
	          	equalTo: "#new_passwd"
	          },
	        },
	        messages: 
	        {
	          new_first: 
	          {
	            required: "Please enter your first name"
	          },
	          new_email: 
	          {
	            required: "Please enter your email address.",
	            email: "Please enter a valid email address"
	          },
	          new_last: 
	          {
	            required: "Please enter your last name"
	          },
	          new_user:
	          {
	          	required: "Please enter a user name"
	          },
	          new_passwd:
	          {
	          	required: "Please enter a password",
	          	minLength: "Password must be at least 6 characters long!"
			  },
			  check_passwd:
	          {
	          	required: "Please retype password",
	          	equalTo: "Passwords do not match"
			  }		        
	       }
	     
	  });
});	