plugin.tx_jscontactform{

	settings{

		fields{

			# cat=jscontactform_fields/enable/0010; type=text; label= Form fields : Selected fields will be reflected in frontend side. [i.e. : first_name, last_name, title, email, phone, fax, mobile, www, address, city, zip, country, company, position, message ]. Place fields name with comma separated
			form 		= first_name, last_name, title, email, phone, fax, mobile, www, address, city, zip, country, company, position, message

			# cat=jscontactform_fields/enable/0020; type=text; label= Required fields : Selected fields will be reflected in frontend side as Required fields. Place required fielda name with comma separated
			required	= first_name, last_name, title, email, phone, fax, mobile, www, address, city, zip, country, company, position, message
		}
	
		logoInMail		= typo3conf/ext/js_contact_form/Resources/Public/Images/logo.png
		logoLink		= 


		receiver{
			emailTemplate	= Email/Receiver.html
		}

		user{
			emailTemplate	= Email/User.html
		}



		additional {
			css {
				
				basic{
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Basic.css
				}

				fancy{
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Fancy.css
	
					include = 0
				}

				responsive{
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Responsive.css

					include = 0
				}

				includeInFooter = 0
			}
			
			javascript{

				jQueryLib{
					uri = typo3conf/ext/js_contact_form/Resources/Public/Script/jquery.min.js
					
					include = 0
					includeInFooter = 0
				}

				ui{
					uri = typo3conf/ext/js_contact_form/Resources/Public/Script/jquery-ui.js
				}

				validation{
					uri = typo3conf/ext/js_contact_form/Resources/Public/Script/Validations.js

					include = 1
					includeInFooter = 1
				}
			}
		}
	}
}