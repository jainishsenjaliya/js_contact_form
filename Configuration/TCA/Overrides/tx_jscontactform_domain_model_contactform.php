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
		 	user_email_subject, page, creation_date, ip, useragent',
);

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['palettes'] = array(
	'name' => array(
		'showitem' => 'first_name, last_name, --linebreak--, 
						title',

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
						city, zip, --linebreak--,
						country',
		'canNotCollapse' => 1
	),
	'organization' => array(
		'showitem' => 'position, company',
		'canNotCollapse' => 1
	),
	'others' => array(
		'showitem' => 'message',
		'canNotCollapse' => 1
	),
);


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['first_name']['config']['size'] = 20;
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


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['creation_date']['config']['size'] = 12;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['address']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['address']['config']['rows'] = 5;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['message']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['message']['config']['rows'] = 10;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_subject']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_subject']['config']['rows'] = 5;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['useragent']['config']['cols'] = 30;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['useragent']['config']['rows'] = 3;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['page']['config'] = array(
				'type'			=> 'select',
				'foreign_table'	=> 'pages',
				'size'			=> 1,
				'minitems'		=> 0,
				'maxitems'		=> 1,
			);


$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['ip']['config']['size'] = 10;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['creation_date']['config']['readOnly'] = 1;

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['ip']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['useragent']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['user_email_subject']['config']['readOnly'] = 1;
$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['columns']['page']['config']['readOnly'] = 1;
