/*
 *  (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *  All rights reserved 
*/

	jQuery(function() {

		var d = new Date();
		var year = d.getFullYear() - 18 ;

		jQuery('.Date').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:-10",
			defaultDate: new Date(year, d.getMonth(), d.getDate()),
			buttonImage: 'Images/Calendar.gif',
			buttonImageOnly: true,
		});
	});

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

	function contactFormValidate(id) {

		var cValids = 0;

		jQuery("#"+id+" .validate").removeClass("error");
		
		jQuery("#"+id+" .validate").each(function(){
			if(jQuery(this).val()==''){
				jQuery(jQuery(this)).addClass("error");
				jQuery(this).attr("placeholder",jQuery(this).attr('mendatory_message'));
				cValids = 1;
			} 
		});
		
		if(jQuery("#"+id+" .email.validate").length > 0){
			
			var email = jQuery("#"+id+" .email");
			if(email.val()!=""){
				if(!checkValidEmail(email)) {
					email.attr("placeholder",email.attr('valid_message'));
					jQuery("#"+id+" .email").val("").addClass("error");
					jQuery("#"+id+" .email").effect( "shake",{times:1}, 300 );
					cValids = 1;
				}
			}
		}
		
		if(jQuery("#"+id+" .www.validate").length > 0){

			var url	= jQuery("#"+id+" .www");
			if(url.val()!=""){
				if(!isUrl(url.val())) {
					url.attr("placeholder",url.attr('valid_message'));
					jQuery("#"+id+" .www").val("").addClass("error");
					cValids = 1;
				}
			}
		}
		
		if(jQuery("#"+id+" .phone.validate").length > 0){
			
			var phone = jQuery("#"+id+" .phone");
			if(phone.val()!=""){
				if(!validatePhone(phone)) {
					phone.attr("placeholder",phone.attr('valid_message'));
					jQuery("#"+id+" .phone").val("").addClass("error");
					cValids = 1;
				}
			}
		}
		
		if(jQuery("#"+id+" .zip.validate").length > 0){
			
			var zip	= jQuery("#"+id+" .zip");
			if(zip.val()!=""){
				if(isNaN(zip.val()) || zip.val().length>6 || zip.val().length<4) {
					zip.attr("placeholder",zip.attr('valid_message'));
					jQuery("#"+id+" .zip").val("").addClass("error");
					cValids = 1;
				}
			}
		}

		
		if(cValids == 0) { 
			jQuery(".formLoading").css("display","block");
		
		}else {
			jQuery("#"+id+" .error").effect( "shake",{times:1}, 600 );
			alert(jQuery("#"+id+" .alert").val());
			return false;
		}
	}


jQuery(document).ready(function() {
	
	jQuery(".tx-js-contact-form .validate").blur(function(){
		
		if(trim(jQuery(this))!=""){
			jQuery(this).removeClass("error");
		}else{
			jQuery(this).addClass("error");
			jQuery(this).attr("placeholder",jQuery(this).attr('mendatory_message'));
			jQuery(this).val("");
			jQuery(this).effect( "shake",{times:1}, 300 );
		}
	})
	
	jQuery(".tx-js-contact-form .validate").keyup(function(){
		
		if(trim(jQuery(this))!=""){
			jQuery(this).removeClass("error");
		}else{
			jQuery(this).addClass("error");
		}
	})
	
	jQuery(".tx-js-contact-form .email.validate").blur(function(){
		
		var email = jQuery(this);

		if(email.val()!=""){
			if(!checkValidEmail(email)) {
				alert(email.attr('valid_message'));
				email.attr("placeholder",email.attr('valid_message'));
				jQuery(this).addClass("error").val("").focus();
				jQuery(this).effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery(".tx-js-contact-form .zip.validate").blur(function(){
		
		var zip	= jQuery(this);
		if(zip.val()!=""){
			if(isNaN(zip.val()) || zip.val().length>6 || zip.val().length<4) {
				alert(zip.attr('valid_message'));
				zip.attr("placeholder",zip.attr('valid_message'));
				jQuery(this).addClass("error").val("").focus();
				jQuery(this).effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery(".tx-js-contact-form .www.validate").blur(function(){
		
		var url	= jQuery(this);
		if(url.val()!=""){
			if(!isUrl(url.val())) {
				alert(url.attr('valid_message'));
				url.attr("placeholder",url.attr('valid_message'));
				jQuery(this).addClass("error").val("").focus();
				jQuery(this).effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery(".tx-js-contact-form .phone.validate").blur(function(){
		
		var phone	= jQuery(this);
		if(phone.val()!=""){
			if(!validatePhone(phone)) {
				alert(phone.attr('valid_message'));
				phone.attr("placeholder",phone.attr('valid_message'));
				jQuery(this).addClass("error").val("").focus();
				jQuery(this).effect( "shake",{times:1}, 300 );
			}
		}
	})
	
	jQuery(".alert-success").delay(10000).hide(500);
	
});