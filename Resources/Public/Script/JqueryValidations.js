/*
 *  (c) 2014 Jainish Senjaliya <jainish.online@gmail.com>
 *  All rights reserved 
*/

jQuery(document).ready(function() {
	
	function checkValidEmail(field) {
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(field.val())) {
			return false;
		}
		return true;
	}
	
	function isUrl(s) {
	    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	    return regexp.test(s);
	}
	
	function validatePhone(field) {
		   
	    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
	    
	    if (!filter.test(field.val())) {
	        return false;
	    }
	    return true;
	}

	function len(value) {
		return value.val().length;
	}
	
	function trim(field){
		return jQuery.trim(field.val());	
	}
	
	jQuery('#newContactForm').submit(function(event){
		
		var cValids = 0;
 			
		jQuery("#newContactForm .validate").removeClass("error");
		
		jQuery("#newContactForm .validate").each(function(){
			if(jQuery(this).val()==''){
				jQuery(jQuery(this)).addClass("error");
				jQuery(this).attr("placeholder",jQuery(this).attr('mendatory_message'));
				cValids = 1;
			} 
		});
		
		if(jQuery('#email.validate').length > 0){
			
			var email		= jQuery('#email');
			if(email.val()!=""){
				if(!checkValidEmail(email)) {
					email.attr("placeholder",email.attr('valid_message'));
					jQuery('#email').val("").addClass("error");
					jQuery('#email').effect( "shake",{times:1}, 300 );
					cValids = 1;
				}
			}
		}
		
		if(jQuery('#url.validate').length > 0){

			var url		= jQuery('#url');
			if(url.val()!=""){
				if(!isUrl(url.val())) {
					url.attr("placeholder",url.attr('valid_message'));
					jQuery('#url').val("").addClass("error");
					cValids = 1;
				}
			}
		}
		
		if(jQuery('#phone.validate').length > 0){
			
			var phone		= jQuery('#phone');
			if(phone.val()!=""){
				if(!validatePhone(phone)) {
					phone.attr("placeholder",phone.attr('valid_message'));
					jQuery('#phone').val("").addClass("error");
					cValids = 1;
				}
			}
		}
		
		if(jQuery('#zip.validate').length > 0){
			
			var zip		= jQuery('#zip');
			if(zip.val()!=""){
				if(isNaN(zip.val()) || zip.val().length>6 || zip.val().length<4) {
					zip.attr("placeholder",zip.attr('valid_message'));
					jQuery('#zip').val("").addClass("error");
					cValids = 1;
				}
			}
		}

		
		if(cValids == 0) { 
			jQuery(".formLoading").css("display","block");
		
		}else {
			jQuery(".error").effect( "shake",{times:1}, 600 );
			alert(jQuery("#newContactForm .alert").val());
			return false;
		}

	});
	
	
	jQuery(".validate").blur(function(){
		
		if(trim(jQuery(this))!=""){
			jQuery(this).removeClass("error");
		}else{
			jQuery(this).addClass("error");
			jQuery(this).attr("placeholder",jQuery(this).attr('mendatory_message'));
			jQuery(this).val("");
			jQuery(this).effect( "shake",{times:1}, 300 );
		}
	})
	
	jQuery(".validate").keyup(function(){
		
		if(trim(jQuery(this))!=""){
			jQuery(this).removeClass("error");
		}else{
			jQuery(this).addClass("error");
		}
	})
	
	jQuery("#email.validate").blur(function(){
		
		var email		= jQuery('#email');
		if(email.val()!=""){
			if(!checkValidEmail(email)) {
				alert(email.attr('valid_message'));
				email.attr("placeholder",email.attr('valid_message'));
				jQuery('#email').addClass("error").val("").focus();
				jQuery('#email').effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery("#zip.validate").blur(function(){
		
		var zip		= jQuery('#zip');
		if(zip.val()!=""){
			if(isNaN(zip.val()) || zip.val().length>6 || zip.val().length<4) {
				alert(zip.attr('valid_message'));
				zip.attr("placeholder",zip.attr('valid_message'));
				jQuery('#zip').addClass("error").val("").focus();
				jQuery('#zip').effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery("#url.validate").blur(function(){
		
		var url		= jQuery('#url');
		if(url.val()!=""){
			if(!isUrl(url.val())) {
				alert(url.attr('valid_message'));
				url.attr("placeholder",url.attr('valid_message'));
				jQuery('#url').addClass("error").val("").focus();
				jQuery('#url').effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery("#phone.validate").blur(function(){
		
		var phone		= jQuery('#phone');
		if(phone.val()!=""){
			if(!validatePhone(phone)) {
				alert(phone.attr('valid_message'));
				phone.attr("placeholder",phone.attr('valid_message'));
				jQuery('#phone').addClass("error").val("").focus();
				jQuery('#phone').effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery(".successMessage").delay(9000).hide(500);
	
});