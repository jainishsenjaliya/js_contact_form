plugin.tx_jscontactform{

	settings{

		fields{
			form 				= {$plugin.tx_jscontactform.settings.fields.form}
			required			= {$plugin.tx_jscontactform.settings.fields.required}

			type{
				message			= Textarea
			}
		}
	
		logoInMail				= {$plugin.tx_jscontactform.settings.logoInMail}
		logoLink				= {$plugin.tx_jscontactform.settings.logoLink}

		receiver{

			emailTemplate	= {$plugin.tx_jscontactform_contactform.view.templateRootPath}{$plugin.tx_jscontactform.settings.user.emailTemplate}

		}

		user{

			emailTemplate	= {$plugin.tx_jscontactform_contactform.view.templateRootPath}{$plugin.tx_jscontactform.settings.user.emailTemplate}

		}

		additional{
			css{
			
				basic{
					uri 	= {$plugin.tx_jscontactform.settings.additional.css.basic.uri}
				}

				fancy{
					uri 	= {$plugin.tx_jscontactform.settings.additional.css.fancy.uri}
					include	= {$plugin.tx_jscontactform.settings.additional.css.fancy.include}
				}

				responsive{
					uri 	= {$plugin.tx_jscontactform.settings.additional.css.responsive.uri}
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
					uri = {$plugin.tx_jscontactform.settings.additional.javascript.ui.uri}
				}

				validation{
					uri				= {$plugin.tx_jscontactform.settings.additional.javascript.validation.uri}
					include			= {$plugin.tx_jscontactform.settings.additional.javascript.validation.include}
					includeInFooter	= {$plugin.tx_jscontactform.settings.additional.javascript.validation.includeInFooter}
				}
			}
		}

	}
}

config.tx_jscontactform.features.skipDefaultArguments = 1
plugin.tx_jscontactform.features.skipDefaultArguments = 1