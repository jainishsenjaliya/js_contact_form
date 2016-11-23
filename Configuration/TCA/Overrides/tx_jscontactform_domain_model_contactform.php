<?php 
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['types']['1'] = array(

	'showitem' =>
		'hidden, 
		--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.name;name,
		--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.contact;contact,
		--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.address;address,
		--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.organization;organization,
		--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.others;others,

		 --div--; LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:extended, 
		 	creation_date, 
		 	--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.receiver;receiver, 
		 	--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.sender;sender,

		 --div--; LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:receiver_email, 
		 	--palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.receiver_email_settings;receiver_email_settings,
		 receiver_email_subject, receiver_email_body;;;richtext:rte_transform[mode=ts_links], 
		 --div--; LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:user_email, 
		 --palette--;LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:palette.user_email_settings;user_email_settings,
		 user_email_subject, user_email_body;;;richtext:rte_transform[mode=ts_links], 
		 --div--; LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:marketing,
		 feuser, ip, useragent, visitors_country, referer_domain, referer_uri, page, mobile_device, website_language, website_language_id, browser_language, 
		',
);

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['palettes'] = array(
	'name' => array(
		'showitem' => 'name, --linebreak--,
						gender, --linebreak--,
						first_name, middle_name, last_name, --linebreak--, 
						title, --linebreak--,
						birthday',

		'canNotCollapse' => 1
	),
	'contact' => array(
		'showitem' => 'email, --linebreak--,
						phone, fax, --linebreak--,
						mobile, --linebreak--,
						www',
		'canNotCollapse' => 1
	),
	'address' => array(
		'showitem' => 'address, --linebreak--,
						building, room, --linebreak--,
						city, zip, --linebreak--,
						region, country',
		'canNotCollapse' => 1
	),
	'organization' => array(
		'showitem' => 'position, company',
		'canNotCollapse' => 1
	),
	'others' => array(
		'showitem' => 'message, --linebreak--,
						description',
		'canNotCollapse' => 1
	),

	'receiver' => array(
		'showitem' => 'receiver_name, receiver_email, --linebreak--,
						receiver_sender_name, receiver_sender_email, --linebreak--,
						receiver_noreply_name, receiver_noreply_email, --linebreak--,
						receiver_cc_send, receiver_cc_name, receiver_cc_email, --linebreak--,
						receiver_bcc_send, receiver_bcc_name, receiver_bcc_email',
	),

	'sender' => array(
		'showitem' => 'user_sender_name, user_sender_email, --linebreak--,
						user_noreply_name, user_noreply_email, --linebreak--,
						user_cc_send, user_cc_name, user_cc_email, --linebreak--,
						user_bcc_send, user_bcc_name, user_bcc_email',
	),
	
	'receiver_email_settings' => array(
		'showitem' => 'receiver_email_configuration, receiver_email_sent',
	),
	'user_email_settings' => array(
		'showitem' => 'user_email_configuration, user_email_sent',
	)
);


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['gender']['config']['type'] = 'radio';
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['gender']['config']['default'] = 'm';
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['gender']['config']['items'] = array(
					array('LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:gender.m', 'm'),
					array('LLL:EXT:js_contact_form/Resources/Private/Language/locallang_tca.xlf:gender.f', 'f'),
				);

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['name']['config']['size'] = 40;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['first_name']['config']['size'] = 20;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['middle_name']['config']['size'] = 20;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['last_name']['config']['size'] = 20;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['title']['config']['size'] = 50;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['www']['config']['wizards'] = array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
						'icon' => 'link_popup.gif',
						'module' => array(
							'name' => 'wizard_element_browser',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'url|page'
							)
						),
						'params' => array(
							'blindLinkOptions' => 'mail,file,spec,folder',
						),
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
					),
				);


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['birthday']['config']['default'] = '';


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['creation_date']['config']['size'] = 12;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['address']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['address']['config']['rows'] = 5;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['message']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['message']['config']['rows'] = 10;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['description']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['description']['config']['rows'] = 10;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_name']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_name']['config']['rows'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email']['config']['rows'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email_subject']['config']['cols'] = 40;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email_subject']['config']['rows'] = 3;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_subject']['config']['cols'] = 40;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_subject']['config']['rows'] = 3;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['useragent']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['useragent']['config']['rows'] = 3;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['referer_uri']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['referer_uri']['config']['rows'] = 3;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['page']['config'] = array(
				'type'			=> 'select',
				'foreign_table'	=> 'pages',
				'size'			=> 1,
				'minitems'		=> 0,
				'maxitems'		=> 1,
			);

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['feuser']['config'] = array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'fe_users',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1
			);

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['ip']['config']['size'] = 10;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['website_language']['config']['size'] = 10;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['website_language_id']['config']['size'] = 10;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['browser_language']['config']['size'] = 10;


// Readonly
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['creation_date']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_sender_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_sender_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_noreply_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_noreply_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_cc_send']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_cc_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_cc_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_bcc_send']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_bcc_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_bcc_email']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_sender_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_sender_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_noreply_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_noreply_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_cc_send']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_cc_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_cc_email']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_bcc_send']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_bcc_name']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_bcc_email']['config']['readOnly'] = 1;


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email_configuration']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email_sent']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['receiver_email_subject']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_configuration']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_sent']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_subject']['config']['readOnly'] = 1;


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['feuser']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['ip']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['useragent']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['visitors_country']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['referer_domain']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['referer_uri']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['page']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['mobile_device']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['website_language']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['website_language_id']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['browser_language']['config']['readOnly'] = 1;
