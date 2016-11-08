plugin.tx_jscontactform{

	settings{

		fields{

			# cat=jscontactform_fields/enable/0010; type=text; label= Form fields : Selected fields will be reflected in frontend side. [i.e. : name, gender, first_name, middle_name, last_name, title, birthday, email, phone, fax, mobile, www, address, building, room, city, zip, region, country, position, company, image, message, description, captcha ]. Place fields name with comma separated
			form 		= name, gender, first_name, middle_name, last_name, title, birthday, email, phone, fax, mobile, www, address, building, room, city, zip, region, country, position, company, image, message, description, captcha

			# cat=jscontactform_fields/enable/0020; type=text; label= Required fields : Selected fields will be reflected in frontend side as Required fields. Place required fielda name with comma separated
			required	= name, gender, first_name, middle_name, last_name, title, birthday, email, phone, fax, mobile, www, address, building, room, city, zip, region, country, position, company, image, message, description, captcha
		}
	
		logoInMail		= typo3conf/ext/js_contact_form/Resources/Public/Images/logo.png
		logoLink		= 

		receiver{
			# cat=jscontactform_receiver/enable/0100; type=boolean; label= Receiver Mail: Enable Email to Receiver
			sendMail	= 1

			# cat=jscontactform_receiver//0110; type=text; label= Receiver Mail Subject: Subject for mail to receiver overwrites flexform settings 
			subject		= 

			# cat=jscontactform_receiver/file; type=string; label= Default Email Template Path :  (e.g. "Email/Receiver.html" this path will be EXT:js_contact_form/Resources/Private/Templates/Email/Receiver.html ) 
			emailTemplate	= Email/Receiver.html

			# cat=jscontactform_receiver//0120; type=text; label= Receiver Name: Receiver Name overwrites flexform settings (e.g. Receiver Name)
			name		= 

			# cat=jscontactform_receiver//0130; type=text; label= Receiver Email: Email of the receivers overwrites flexform settings (e.g. receiver@mail.com)
			email		= 

			sender {
				# cat=jscontactform_receiver//0140; type=text; label= Receiver Sender Name: Sender Name for mail to receiver overwrites flexform settings (e.g. Sender Name) : [ Empty sender will be user first_name or name OR we can set {first_name} or {name} OR {first_name} {last_name}]
				name		= {name}

				# cat=jscontactform_receiver//0150; type=text; label= Receiver Sender Email: Sender Email for mail to receiver overwrites flexform settings (e.g. sender@mail.com ) : if blank or {email} then it will take it from user email
				email		= {email}
			}
			noreply {
				# cat=jscontactform_receiver//0160; type=text; label= Receiver Reply Name: Reply Name for mail to receiver overwrites flexform settings (e.g. noreply Name) 
				name		= noreply

				# cat=jscontactform_receiver//0170; type=text; label= Receiver Reply Email: Reply Email for mail to receiver overwrites flexform settings (e.g. noreply@your-domain.com)
				email		= noreply@your-domain.com
			}
			cc {
				# cat=jscontactform_receiver//0180; type=boolean; label= Receiver CC Mail: Enable CC Email to Receiver
				sendMail	= 0

				# cat=jscontactform_receiver//0190; type=text; label= Receiver CC Name: CC Name for mail to receiver (e.g. noreply Name) 
				name		= 

				# cat=jscontactform_receiver//0200; type=text; label= Receiver CC Email: CC Email for mail to receiver (e.g. noreply@your-domain.com)
				email		= 
			}
			bcc {
				# cat=jscontactform_receiver//0210; type=boolean; label= Receiver BCC Mail: Enable BCC Email to Receiver
				sendMail	= 0

				# cat=jscontactform_receiver//0220; type=text; label= Receiver BCC Name: BCC Name for mail to receiver (e.g. noreply Name) 
				name		= 

				# cat=jscontactform_receiver//0230; type=text; label= Receiver BCC Email: BCC Email for mail to receiver (e.g. noreply@your-domain.com)
				email		= 
			}
			body{
				# cat=jscontactform_receiver//0240; type=boolean; label= Receiver Default Mail Template: If Enable then Default Mail Template will be sent to Receiver. [ i.e. Email/Receiver.html ]
				default		= 1

				# cat=jscontactform_receiver//0250; type=text; label= Body text for Email to Receiver : sent all user information  (e.g.  {js_contact_form_all} ). If "Receiver Default Mail Template" is disable then following data will sent in mail.
				message		= {js_contact_form_all}
			}
		}

		user{

			# cat=jscontactform_user/enable/0300; type=boolean; label= User Mail: Enable Email to User
			sendMail	= 1

			# cat=jscontactform_user//0310; type=text; label= User Mail Subject: Subject for mail to User overwrites flexform settings 
			subject		= 

			# cat=jscontactform_user/file; type=string; label= Default Email Template Path :  (e.g. "Email/User.html" this path will be EXT:js_contact_form/Resources/Private/Templates/Email/User.html ) 
			emailTemplate	= Email/User.html

			sender {
				# cat=jscontactform_user//0320; type=text; label= User Sender Name: Sender Name for mail to User overwrites flexform settings (e.g. Sender Name)
				name		= 

				# cat=jscontactform_user//0330; type=text; label= User Sender Email: Sender Email for mail to User overwrites flexform settings (e.g. sender@mail.com )
				email		= 
			}
			noreply {
				# cat=jscontactform_user//0340; type=text; label= User Reply Name: Reply Name for mail to User overwrites flexform settings (e.g. noreply Name) 
				name		= noreply

				# cat=jscontactform_user//0350; type=text; label= User Reply Email: Reply Email for mail to User overwrites flexform settings (e.g. noreply@your-domain.com)
				email		= noreply@your-domain.com
			}
			cc {

				# cat=jscontactform_user//0360; type=boolean; label= User CC Mail: Enable CC Email to User
				sendMail	= 0
				
				# cat=jscontactform_user//0370; type=text; label= User CC Name: CC Name for mail to User (e.g. noreply Name) 
				name		= 

				# cat=jscontactform_user//0380; type=text; label= User CC Email: CC Email for mail to User (e.g. noreply@your-domain.com)
				email		= 
			}
			bcc {

				# cat=jscontactform_user//0390; type=boolean; label= User BCC Mail: Enable BCC Email to User
				sendMail	= 0
				
				# cat=jscontactform_user//0400; type=text; label= User BCC Name: BCC Name for mail to User (e.g. noreply Name) 
				name		= 

				# cat=jscontactform_user//0410; type=text; label= User BCC Email: BCC Email for mail to User (e.g. noreply@your-domain.com)
				email		= 
			}
			body{
				# cat=jscontactform_user//0420; type=boolean; label= User Default Mail Template: If Enable then Default Mail Template will be sent to User. [ i.e. Email/User.html ]
				default		= 1

				# cat=jscontactform_user//0430; type=text; label= Body text for Email to User : sent all user information  (e.g.  {js_contact_form_all} ). If "User Default Mail Template" is disable then following data will sent in mail.
				message		= {js_contact_form_all}
			}
		}

		thanks{
			# cat=jscontactform_thanks//0500; type=text; label= Message Notification: Message Notification will display at top of the screen after submitting the form
			messageNotification = Thanks you for your response! We will get back to you as soon as possible!

			# cat=jscontactform_thanks//0510; type=text; label= Page Redirect Link : Page will be redirect after submitting the form
			redirect = 

			# cat=jscontactform_thanks//0520; type=text; label= Thanks Message : Message will be display after submitting the form
			message				= Thanks you for your response! We will get back to you as soon as possible!
		}

		additional {
			css {
				
				basic{
					# cat=jscontactform_additional/file; type=string; label= Basic CSS Path
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Basic.css
				}

				fancy{
					# cat= jscontactform_additional/file; type=string; label= Fancy CSS Path
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Fancy.css
	
					include = 0
				}

				ui{
					# cat= jscontactform_additional/file; type=string; label= Jquery-ui CSS Path
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Jquery-ui.css
	
					include = 1
				}

				responsive{
					# cat= jscontactform_additional/file; type=string; label= Responsive CSS Path
					uri = typo3conf/ext/js_contact_form/Resources/Public/Css/Responsive.css

					include = 0
				}

				includeInFooter = 0
			}
			
			javascript{

				jQueryLib{
					# cat=jscontactform_additional/file; type=string; label= jQuery Library
					uri = typo3conf/ext/js_contact_form/Resources/Public/Script/jquery.min.js
					
					include = 0
					includeInFooter = 0
				}

				ui{
					# cat=jscontactform_additional/file; type=string; label= jQuery UI Library
					uri = typo3conf/ext/js_contact_form/Resources/Public/Script/jquery-ui.js

					include = 1
				}

				validation{
					# cat=jscontactform_additional/file; type=string; label= Javascript Path
					uri = typo3conf/ext/js_contact_form/Resources/Public/Script/Validations.js

					include = 1
					includeInFooter = 1
				}
			}
		}

		captcha {
			# cat=jscontactform_spam//0600; type=text; label= Captcha Background: Set own captcha background image (e.g. fileadmin/bg.png)
			image = EXT:js_contact_form/Resources/Public/Images/captcha.png

			# cat=jscontactform_spam//0610; type=text; label= Captcha Text Color: Define your text color in hex code - must start with # (e.g. #ff0000)
			textColor = #666666

			# cat=jscontactform_spam//0620; type=int+; label= Captcha Text Size: Define your text size in px (e.g. 24)
			textSize = 44

			# cat=jscontactform_spam//0630; type=text; label= Captcha Font: Set TTF-Font for captcha image (e.g. fileadmin/font.ttf)
			font = EXT:js_contact_form/Resources/Public/Fonts/youmurderer-bb.regular.ttf

			# cat=jscontactform_spam//0640; type=text; label= Captcha Text Angle: Define two different values (start and stop) for your text random angle and separate it with a comma (e.g. -10,10)
			textAngle = -1,1

			# cat=jscontactform_spam//0650; type=text; label= Captcha Text Distance Hor: Define two different values (start and stop) for your text horizontal random distance and separate it with a comma (e.g. 20,80)
			distanceHor = 20,80

			# cat=jscontactform_spam//0660; type=text; label= Captcha Text Distance Ver: Define two different values (start and stop) for your text vertical random distance and separate it with a comma (e.g. 30,60)
			distanceVer = 30,60
		}
	}
}