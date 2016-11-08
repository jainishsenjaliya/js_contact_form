plugin.tx_jscontactform{

	settings{

		fields{
			form 				= {$plugin.tx_jscontactform.settings.fields.form}
			required			= {$plugin.tx_jscontactform.settings.fields.required}

			type{
				birthday		= Date
				message			= Textarea
				address			= Textarea
				description		= Textarea
				captcha			= Captcha
				gender			= Radio
				image			= File
				birthday		= Date
			}

			gender		= m, f
		}
	
		logoInMail				= {$plugin.tx_jscontactform.settings.logoInMail}
		logoLink				= {$plugin.tx_jscontactform.settings.logoLink}


		receiver{

			sendMail		= {$plugin.tx_jscontactform.settings.receiver.sendMail}

			subject			= {$plugin.tx_jscontactform.settings.receiver.subject}
			emailTemplate	= {$plugin.tx_jscontactform_contactform.view.templateRootPath}{$plugin.tx_jscontactform.settings.user.emailTemplate}

			name			= {$plugin.tx_jscontactform.settings.receiver.name}
			email			= {$plugin.tx_jscontactform.settings.receiver.email}

			sender {
				name		= {$plugin.tx_jscontactform.settings.receiver.sender.name}
				email		= {$plugin.tx_jscontactform.settings.receiver.sender.email}
			}
			noreply {
				name		= {$plugin.tx_jscontactform.settings.receiver.noreply.name}
				email		= {$plugin.tx_jscontactform.settings.receiver.noreply.email}
			}
			cc {
				sendMail	= {$plugin.tx_jscontactform.settings.receiver.cc.sendMail}
				name		= {$plugin.tx_jscontactform.settings.receiver.cc.name}
				email		= {$plugin.tx_jscontactform.settings.receiver.cc.email}
			}
			bcc {
				sendMail	= {$plugin.tx_jscontactform.settings.receiver.bcc.sendMail}
				name		= {$plugin.tx_jscontactform.settings.receiver.bcc.name}
				email		= {$plugin.tx_jscontactform.settings.receiver.bcc.email}
			}
			body{
				default		= {$plugin.tx_jscontactform.settings.receiver.body.default}
				message		= {$plugin.tx_jscontactform.settings.receiver.body.message}
			}
		}

		user{

			sendMail	= {$plugin.tx_jscontactform.settings.user.sendMail}

			subject		= {$plugin.tx_jscontactform.settings.user.subject}

			emailTemplate	= {$plugin.tx_jscontactform_contactform.view.templateRootPath}{$plugin.tx_jscontactform.settings.user.emailTemplate}

			sender {
				name		= {$plugin.tx_jscontactform.settings.user.sender.name}
				email		= {$plugin.tx_jscontactform.settings.user.sender.email}
			}
			noreply {
				name		= {$plugin.tx_jscontactform.settings.user.noreply.name}
				email		= {$plugin.tx_jscontactform.settings.user.noreply.email}
			}
			cc {
				sendMail	= {$plugin.tx_jscontactform.settings.user.cc.sendMail}
				name		= {$plugin.tx_jscontactform.settings.user.cc.name}
				email		= {$plugin.tx_jscontactform.settings.user.cc.email}
			}
			bcc {
				sendMail	= {$plugin.tx_jscontactform.settings.user.bcc.sendMail}
				name		= {$plugin.tx_jscontactform.settings.user.bcc.name}
				email		= {$plugin.tx_jscontactform.settings.user.bcc.email}
			}
			body{
				default		= {$plugin.tx_jscontactform.settings.user.body.default}
				message		= {$plugin.tx_jscontactform.settings.user.body.message}
			}
		}

		thanks{
			messageNotification = {$plugin.tx_jscontactform.settings.thanks.messageNotification}
			redirect 			= {$plugin.tx_jscontactform.settings.thanks.redirect}
			message				= {$plugin.tx_jscontactform.settings.thanks.message}
		}

		additional{
			css{
			
				basic{
					uri		= {$plugin.tx_jscontactform.settings.additional.css.basic.uri}
				}

				fancy{
					uri		= {$plugin.tx_jscontactform.settings.additional.css.fancy.uri}
					include	= {$plugin.tx_jscontactform.settings.additional.css.fancy.include}
				}

				ui{
					uri		= {$plugin.tx_jscontactform.settings.additional.css.ui.uri}
					include	= {$plugin.tx_jscontactform.settings.additional.css.ui.include}
				}

				responsive{
					uri		= {$plugin.tx_jscontactform.settings.additional.css.responsive.uri}
					include	= {$plugin.tx_jscontactform.settings.additional.css.responsive.include}
				}

				includeInFooter = {$plugin.tx_jscontactform.settings.additional.css.includeInFooter}
			}

			javascript{

				jQueryLib{
					uri 			= {$plugin.tx_jscontactform.settings.additional.javascript.jQueryLib.uri}
					include 		= {$plugin.tx_jscontactform.settings.additional.javascript.jQueryLib.include}
					includeInFooter	= {$plugin.tx_jscontactform.settings.additional.javascript.jQueryLib.includeInFooter}
				}

				ui{
					uri			= {$plugin.tx_jscontactform.settings.additional.javascript.ui.uri}
					include		= {$plugin.tx_jscontactform.settings.additional.javascript.ui.include}
				}

				validation{
					uri				= {$plugin.tx_jscontactform.settings.additional.javascript.validation.uri}
					include			= {$plugin.tx_jscontactform.settings.additional.javascript.validation.include}
					includeInFooter	= {$plugin.tx_jscontactform.settings.additional.javascript.validation.includeInFooter}
				}
			}
		}

		captcha {
			# Select "default" (on board calculating captcha) or "captcha" (needs extension captcha)
			use = default

			default {
				image 		= {$plugin.tx_jscontactform.settings.captcha.image}
				textColor	= {$plugin.tx_jscontactform.settings.captcha.textColor}
				textSize	= {$plugin.tx_jscontactform.settings.captcha.textSize}
				font 		= {$plugin.tx_jscontactform.settings.captcha.font}
				textAngle	= {$plugin.tx_jscontactform.settings.captcha.textAngle}
				distanceHor	= {$plugin.tx_jscontactform.settings.captcha.distanceHor}
				distanceVer	= {$plugin.tx_jscontactform.settings.captcha.distanceVer}

				# You can force a fix captcha - operator must be "+" (for testing only with calculating captcha)
				# forceValue = 1+1
			}
		}
	}
}

config.tx_jscontactform.features.skipDefaultArguments = 1
plugin.tx_jscontactform.features.skipDefaultArguments = 1