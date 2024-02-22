jQuery(document).ready(function() {
	// Menu hamburger
	$( '.hamburger-menu' ).on( 'click', function() {
		$('body').toggleClass('menuopen');
		$('.hamburger-menu').toggleClass('open');
		$('.navbar-collapse').toggleClass('show');
		$('.navbar-overlay').toggleClass('show');
	});

	// $(".documentation-download-item").click(function(){
	// 	$(this).find(".documentation-download-btn-wrap").slideToggle();
	// });
	
	$("#editquotepopup a").click(function(){
		$("#editquotepopup").modal("hide");
		$("#sendquotepopup").modal("show");
	});
	$(".password-icon-view").click(function() {
		$(this).hide();
		$(this).closest(".form-element").find(".password-icon-hide").show();
		var input = $(this).closest(".form-element").find("input");
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
	$(".password-icon-hide").click(function() {
		$(this).hide();
		$(this).closest(".form-element").find(".password-icon-view").show();
		var input = $(this).closest(".form-element").find("input");
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	$(".btn-step-1").click(function() {
		$(".step-1").hide();
		$(".step-2").show();
		$(".step-count-progress").removeClass(".current-step-1");
		$(".step-count-progress").addClass("current-step-2");
		$(".breadcrumb-wrap .breadcrumb-item a").attr("href", "javascript:void(0)");
		// if ($('#contractor').is(':checked')) {
		// 	$('.customer-field-wrap').hide();
		// 	$('.contractor-field-wrap').show();
		// 	$('.stepform-sec').addClass('contractor-stepform-sec');
		// } else {
		// 	$('.customer-field-wrap').show();
		// 	$('.contractor-field-wrap').hide();
		// 	$('.stepform-sec').removeClass('contractor-stepform-sec');
		// }
	});

	$(".step-2 .backto-login a, .breadcrumb-wrap .breadcrumb-item a").click(function() {
		$(".step-2").hide();
		$(".step-1").show();
		$(".step-count-progress").removeClass(".current-step-2");
		$(".step-count-progress").addClass("current-step-1");
		$(".breadcrumb-wrap .breadcrumb-item a").attr("href", "login.html");
	});

	$('#uploadimage').change(function (e) {
		const filename = e.target.files[0].name;
		$(this).closest(".upload-img-wrap").find(".upload-img-text").html(filename);
	});



	// add document file name  on change
	$('#documents').change(function (e){
		const filename = e.target.files[0].name;
		$(this).closest(".upload-img-wrap").find(".upload-img-text").html(filename);

	});

	$('#insurancedocuments').change(function (e){
		const filename = e.target.files[0].name;
		$(this).closest(".upload-img-wrap").find(".upload-img-text").html(filename);

	});

	$('#mortgagedocuments').change(function (e){
		const filename = e.target.files[0].name;
		$(this).closest(".upload-img-wrap").find(".upload-img-text").html(filename);

	});

	$('#contractordocuments').change(function (e){
		const filename = e.target.files[0].name;
		$(this).closest(".upload-img-wrap").find(".upload-img-text").html(filename);

	});

	// $(".btn-studio-step-1").click(function() {
	// 	$(".studio-step-1").hide();
	// 	$(".studio-step-2").show();
	// 	$(".step-count-progress").removeClass("current-step-1");
	// 	$(".step-count-progress").addClass("current-step-2");
	// });

	// $(".btn-studio-step-2").click(function() {
	// 	$(".studio-step-2").hide();
	// 	$(".studio-step-3").show();
	// 	$(".step-count-progress").removeClass("current-step-2");
	// 	$(".step-count-progress").addClass("current-step-3");
	// });

	// Category Filter
	$('.btn-gallery-filter').click(function(){
		var category = $(this).attr('data-category');
		$('.btn-gallery-filter').removeClass('active');
		$(this).addClass('active');

		if(category == 'all'){
			$('.item').removeClass('hide');
		} else {
			$('.item').removeClass('hide').filter( ':not([data-category*="' + category + '"])' ).addClass( 'hide');
		}
	});

	// Image Gallery Popup
	$( '.image-gallery-popup' ).each(function( index ) {
		$('.image-gallery-popup').magnificPopup({
			type: 'image',
			gallery:{
				enabled:true
			},
			closeOnContentClick: true,
			image: {
				verticalFit: false
			}
		});
	});

	if ( $(window).width() > 767 ) {
		jQuery('.login-content-slider.owl-carousel').owlCarousel({
			loop:true,
			nav:false,
			responsive:{
				0:{
					items:1
				}
			}
		});
	}

	// Text only validation
	// $('#yourname').bind('keyup blur', function () {
	// 	var node = $(this);
	// 	node.val(node.val().replace(/[^A-Za-z ']/g, ''));
	// });

	// Number only validation
	$('#contactnumber, #zipcode, #phoneno').keypress(function (event) {
		var keycode = event.which;
		if (!(event.shiftKey == false && (keycode == 43 || keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
			event.preventDefault();
		}
	});

	// Validation JS
	$("#loginform button[type='submit']").click(function () {
		var form = $("#loginform");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
				},
			},
		});
	});

	// Register
$("#register input[type='submit']").click(function () {
	// alert("in")
    const form = $("#register");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element) {
			$(element).addClass("help-block");
			$(element).parent().addClass("field-error");
		},
		unhighlight: function(element) {
			$(element).removeClass("help-block");
			$(element).parent().removeClass("field-error");
		},
    // Define the initial rules
    rules : {
        name: {
            required: true,
        },
        email: {
            required: true,
			email: true

        },
        password: {
            required: true,
        },
        password_confirmation: {
            required: true,
        },
        // profile_image: {
        //     required: true,
        // },
        // contact_number: {
        //     required: true,
        // },
        // zip_code: {
        //     required: true,
        // },
    },
	// submitHandler: function (form) {
	// 	// console.log('teWe can go. No it's okay. It's not five minutes public.dest');
	// 	// form.submit( );
	// }

	
});

});





	// $("#register button[type='submit']").click(function () {
	// 	var form = $("#register");
	// 	form.validate({
	// 		errorElement: 'span',
	// 		errorClass: 'help-block',
	// 		highlight: function(element) {
	// 			$(element).addClass("help-block");
	// 			$(element).parent().addClass("field-error");
	// 		},
	// 		unhighlight: function(element) {
	// 			$(element).removeClass("help-block");
	// 			$(element).parent().removeClass("field-error");
	// 		},
	// 		rules: {
	// 			// uname: {
	// 			// 	required: true,
	// 			// },
	// 			// uemail: {
	// 			// 	required: true,
	// 			// 	email: true
	// 			// },
	// 			// password: {
	// 			// 	required: true,
	// 			// },
	// 			// confirmpassword: {
	// 			// 	equalTo: "#password"
	// 			// },
	// 			// uploadimage: {
	// 			// 	required: true,
	// 			// },
	// 			// contactnumber: {
	// 			// 	required: true,
	// 			// 	minlength: 9,
	// 			// 	maxlength: 14,
	// 			// },
	// 			// zipcode: {
	// 			// 	required: true,
	// 			// },
	// 			name: {
	// 					required: true,
	// 				},
	// 				email: {
	// 					required: true,
	// 				},
	// 				password: {
	// 					required: true,
	// 				},
	// 				password_confirmation: {
	// 					required: true,
	// 				},
	// 				profile_image: {
	// 					required: true,
	// 				},
	// 				contact_number: {
	// 					required: true,
	// 				},
	// 				zip_code: {
	// 					required: true,
	// 				},
	// 				// contractor_portfolio:{
	// 				// 	required:true,
	// 				// }
	// 		},
	// 	});
	// });

	// contactus
	$("#contactus button[type='submit']").click(function () {
		var form = $("#contactus");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			rules: {
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true
				},
				phoneno: {
					required: true,
					minlength: 9,
					maxlength: 14,
				},
				address: {
					required: true,
				},
				yourcomments: {
					required: true,
				},
			},
		});
	});

	// Construction
	$("#construction button[type='submit']").click(function () {
		var form = $("#construction");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element) {
				$(element).addClass("help-block");
				$(element).parent().addClass("field-error");
			},
			unhighlight: function(element) {
				$(element).removeClass("help-block");
				$(element).parent().removeClass("field-error");
			},
			rules: {
				schedule: {
					required: true,
				},
				uploadimage: {
					required: true,
				},
			},
		});
	});

	// Reset password form
	$("#resetpasswordform button[type='submit']").click(function () {
		var form = $("#resetpasswordform");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			rules: {
				password: {
					required: true,
				},
				confirmpassword: {
					equalTo: "#password"
				},
			},
		});
	});

	// Forgot Password
	$("#forgotpassword button[type='submit']").click(function () {
		var form = $("#forgotpassword");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			rules: {
				email: {
					required: true,
					email: true
				},
			},
		});
	});


	// Add project general info
	$("#addproject button").click(function () {
		var form = $("#addproject");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element) {
				$(element).addClass("help-block");
				$(element).parent().addClass("field-error");
			},
			unhighlight: function(element) {
				$(element).removeClass("help-block");
				$(element).parent().removeClass("field-error");
			},
			rules: {
				// uploadimage: {
				// 	required: true,
				// },
				title: {
					required: true,
				},
				address: {
					required: true,
				},
				insurancecompany: {
					required: true,
				},
				insuranceagency: {
					required: true,
				},
				billing: {
					required: true,
				},
				mortgagecompany: {
					required: true,
				},
				// documents: {
				// 	required: true,
				// },
			},
			submitHandler: function (form) {
				//var csrfToken = $('meta[name="csrf-token"]').attr('content');

                 form.submit();
				 $.ajax({
					type: "POST",
					url: "{{route('general.info.store')}}",
					data: form.serialize(), // Serialize form data
					success: function (response) {
						// Handle success, e.g., redirect or show a success message
						console.log(response);
					},
					error: function (xhr, status, error) {
						// Handle error
						console.error(xhr.responseText);
					}
				});
				
				
            }
		});


	
		// if (form.valid() === true) {
		// 	if ($('.studio-step-1').is(":visible")) {
		// 		$(".studio-step-1").hide();
		// 		$(".studio-step-2").show();
		// 		$(".step-count-progress").removeClass("current-step-1");
		// 		$(".step-count-progress").addClass("current-step-2");
		// 		$(".breadcrumb .breadcrumb-item a").attr("href", "javascript:void(0)");
		// 		$(".breadcrumb .breadcrumb-item a").addClass("backto-step-1");
				
		// 		$(".breadcrumb-addproject-step-1").addClass("breadcrumb-addproject-title-wrap");
		// 		$(".breadcrumb-addproject-step-2").removeClass("breadcrumb-addproject-title-wrap");

		// 	} else if ($('.studio-step-2').is(":visible")) {
		// 		$(".studio-step-2").hide();
		// 		$(".studio-step-3").show();
		// 		$(".step-count-progress").removeClass("current-step-2");
		// 		$(".step-count-progress").addClass("current-step-3");
		// 		$(".breadcrumb .breadcrumb-item a").attr("href", "javascript:void(0)");
		// 		$(".breadcrumb .breadcrumb-item a").removeClass("backto-step-1");
		// 		$(".breadcrumb .breadcrumb-item a").addClass("backto-step-2");
		// 		$(".breadcrumb-addproject-step-2").addClass("breadcrumb-addproject-title-wrap");
		// 		$(".breadcrumb-addproject-step-3").removeClass("breadcrumb-addproject-title-wrap");

		// 	} else if ($('.studio-step-3').is(":visible")) {

		// 	}
		// }
	});



	//step 1 design studio
	

	// document form documentform
	$("#documentform_step3 button").click(function () {
		
		var form = $("#documentform_step3");


		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element) {
				$(element).addClass("help-block");
				$(element).parent().addClass("field-error");
			},
			unhighlight: function(element) {
				$(element).removeClass("help-block");
				$(element).parent().removeClass("field-error");
			},
			rules: {
				// documents: {
				// 	required: function(element) {
				// 		return !($("#documents_hidden").val());
				// 	}
				// },
				// insurancedocuments:{
				// 	required: function(element) {
				// 		return !($("#insurancedocuments_hidden").val());
				// 	}
				// },
				// mortgagedocuments:{
				// 	required: function(element) {
				// 		return !($("#mortgagedocuments_hidden").val());
				// 	},
				// },
				// contractordocuments:{
				// 	required: function(element) {
				// 		return !($("#contractordocuments_hidden").val());
				// 	},
				// }
			},
			submitHandler: function (form) {
				 form.submit();
				 $.ajax({
					type: "POST",
					url: "{{ route('documentation.store') }}",
					data: form.serialize(), // Serialize form data
					success: function (response) {
						// Handle success, e.g., redirect or show a success message
						console.log(response);
					},
					error: function (xhr, status, error) {
						// Handle error
						console.error(xhr.responseText);
					}
				});
				
				
			}
		});
	});

// design studio form 
	$("#design_studio_step1 button").click(function () {
		var form = $("#design_studio_step1");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element) {
				$(element).addClass("help-block");
				$(element).parent().addClass("field-error");
			},
			unhighlight: function(element) {
				$(element).removeClass("help-block");
				$(element).parent().removeClass("field-error");
			},
			rules: {
				project_image:{
					required:true,
				},
				roofandgutterdesign:{
					required:true,
				},
				rooftypeandrating:{
					required:true,
				},
				guttertypeaccessories:{
					required:true,
				},
				guttertypeaccessories1:{
					required:true,
				}
			},
			submitHandler: function (form) {
				
					form.submit();
					$.ajax({
					type: "POST",
					url: "{{ route('design.studio.post') }}",
					data: form.serialize(), // Serialize form data
					success: function (response) {
						// Handle success, e.g., redirect or show a success message
						console.log(response);
					},
					error: function (xhr, status, error) {
						// Handle error
						console.error(xhr.responseText);
					}
				});
				
				
			}
		});
	});






	// $(document).on("click",".studio-step-2 .backto-login a, .breadcrumb .breadcrumb-item a.backto-step-1",function() {
	// 	// $(".studio-step-2 .backto-login a, .breadcrumb .breadcrumb-item a.backto-step-1").click(function() {
	// 	// $(".breadcrumb .breadcrumb-item a").attr("href", "login.html");
	// 	$(".studio-step-2").hide();
	// 	$(".studio-step-1").show();
	// 	$(".step-count-progress").removeClass("current-step-2");
	// 	$(".step-count-progress").addClass("current-step-1");
	// 	$(".breadcrumb .breadcrumb-item a.backto-step-1").removeClass("backto-step-1");
	// 	$(".breadcrumb-addproject-step-2").addClass("breadcrumb-addproject-title-wrap");
	// 	$(".breadcrumb-addproject-step-1").removeClass("breadcrumb-addproject-title-wrap");
	// });
	// $(document).on("click",".studio-step-3 .backto-login a, .breadcrumb .breadcrumb-item a.backto-step-2",function() {
	// // $(".studio-step-3 .backto-login a, .breadcrumb .breadcrumb-item a.backto-step-2").click(function() {
	// 	$(".studio-step-1").hide();
	// 	$(".studio-step-3").hide();
	// 	$(".studio-step-2").show();
	// 	$(".step-count-progress").removeClass("current-step-3");
	// 	$(".step-count-progress").addClass("current-step-2");
	// 	$(".breadcrumb .breadcrumb-item a.backto-step-2").removeClass("backto-step-2");
	// 	$(".breadcrumb .breadcrumb-item a").addClass("backto-step-1");

	// 	$(".breadcrumb-addproject-step-1").addClass("breadcrumb-addproject-title-wrap");
	// 	$(".breadcrumb-addproject-step-3").addClass("breadcrumb-addproject-title-wrap");
	// 	$(".breadcrumb-addproject-step-2").removeClass("breadcrumb-addproject-title-wrap");
	// });


	// function getUrlParameter(name) {
	// 	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	// 	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	// 	results = regex.exec(location.search);
	// 	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	// }
	// var qsp = 'step',
	// para = getUrlParameter(qsp);
	// if ( para == "step2") {
	// 	// $(".btn-studio-step-1").trigger("click");
	// 	$(".studio-step-1").hide();
	// 	$(".studio-step-2").show();
	// 	$(".step-count-progress").removeClass("current-step-1");
	// 	$(".step-count-progress").addClass("current-step-2");
	// 	$(".breadcrumb .breadcrumb-item a").attr("href", "javascript:void(0)");
	// 	$(".breadcrumb .breadcrumb-item a").addClass("backto-step-1");
		
	// 	$(".breadcrumb-addproject-step-1").addClass("breadcrumb-addproject-title-wrap");
	// 	$(".breadcrumb-addproject-step-2").removeClass("breadcrumb-addproject-title-wrap");
	// }
	// if ( para == "step3") {
	// 	// $(".studio-step-1").hide();
	// 	// $(".btn-studio-step-2").trigger("click");
	// 	$(".studio-step-1").hide();
	// 	$(".studio-step-3").hide();
	// 	$(".studio-step-2").show();
	// 	$(".step-count-progress").removeClass("current-step-3");
	// 	$(".step-count-progress").addClass("current-step-2");
	// 	$(".breadcrumb .breadcrumb-item a.backto-step-2").removeClass("backto-step-2");
	// 	$(".breadcrumb .breadcrumb-item a").addClass("backto-step-1");

	// 	$(".breadcrumb-addproject-step-1").addClass("breadcrumb-addproject-title-wrap");
	// 	$(".breadcrumb-addproject-step-3").addClass("breadcrumb-addproject-title-wrap");
	// 	$(".breadcrumb-addproject-step-2").removeClass("breadcrumb-addproject-title-wrap");
	// }
});