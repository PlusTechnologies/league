$(document).ready(function() {
  	var $validator = $("#new_account").validate({
		  rules: {
		    firstname: {
		      required: true,
		      minlength: 3
		    },
		    lastname: {
		      required: true,
		      minlength: 5
		    },
		    email: {
		      required: true,
		      email: true,
		      minlength: 3
		    },
		    mobile: {
		      required: true,
		      phoneUS: true,
		    },
		    password: {
		      required: true,
		      minlength: 8,
		      maxlength: 20,
		    },
		    confirm_password: {
		      required: true,
		      equalTo: "#password",
		    }
		  }
		});
 
	  	$('#rootwizard').bootstrapWizard({
	  		onTabShow: function(tab, navigation, index) {
	  			$(".bs-wizard").removeClass('nav-pills');
	  			$(".bs-wizard").removeClass('nav');
	  		},
	  		'onNext': function(tab, navigation, index) {
	  			var $valid = $("#new_account").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
	  			else {
	  				alert("Step 1 Fields are valid! Ask about making the Profile Pic required...");
	  			}
	  		}
	  	});	
});