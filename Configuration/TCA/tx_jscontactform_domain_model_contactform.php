<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,gender,first_name,middle_name,last_name,title,birthday,email,phone,fax,mobile,www,address,building,room,city,zip,region,country,company,position,image,message,description,skype,twitter,facebook,linkedin,creation_date,receiver_email_configuration,receiver_email_sent,receiver_name,receiver_email,receiver_sender_name,receiver_sender_email,receiver_noreply_name,receiver_noreply_email,receiver_cc_send,receiver_cc_name,receiver_cc_email,receiver_bcc_send,receiver_bcc_name,receiver_bcc_email,receiver_email_subject,receiver_email_body,user_email_configuration,user_email_sent,user_sender_name,user_sender_email,user_noreply_name,user_noreply_email,user_cc_send,user_cc_name,user_cc_email,user_bcc_send,user_bcc_name,user_bcc_email,user_email_subject,user_email_body,feuser,ip,useragent,visitors_country,referer_domain,referer_uri,page,mobile_device,website_language,website_language_id,browser_language,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_contact_form') . 'Resources/Public/Icons/tx_jscontactform_domain_model_contactform.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, gender, first_name, middle_name, last_name, title, birthday, email, phone, fax, mobile, www, address, building, room, city, zip, region, country, company, position, image, message, description, skype, twitter, facebook, linkedin, creation_date, receiver_email_configuration, receiver_email_sent, receiver_name, receiver_email, receiver_sender_name, receiver_sender_email, receiver_noreply_name, receiver_noreply_email, receiver_cc_send, receiver_cc_name, receiver_cc_email, receiver_bcc_send, receiver_bcc_name, receiver_bcc_email, receiver_email_subject, receiver_email_body, user_email_configuration, user_email_sent, user_sender_name, user_sender_email, user_noreply_name, user_noreply_email, user_cc_send, user_cc_name, user_cc_email, user_bcc_send, user_bcc_name, user_bcc_email, user_email_subject, user_email_body, feuser, ip, useragent, visitors_country, referer_domain, referer_uri, page, mobile_device, website_language, website_language_id, browser_language',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, gender, first_name, middle_name, last_name, title, birthday, email, phone, fax, mobile, www, address, building, room, city, zip, region, country, company, position, image, message, description, skype, twitter, facebook, linkedin, creation_date, receiver_email_configuration, receiver_email_sent, receiver_name, receiver_email, receiver_sender_name, receiver_sender_email, receiver_noreply_name, receiver_noreply_email, receiver_cc_send, receiver_cc_name, receiver_cc_email, receiver_bcc_send, receiver_bcc_name, receiver_bcc_email, receiver_email_subject, receiver_email_body;;;richtext:rte_transform[mode=ts_links], user_email_configuration, user_email_sent, user_sender_name, user_sender_email, user_noreply_name, user_noreply_email, user_cc_send, user_cc_name, user_cc_email, user_bcc_send, user_bcc_name, user_bcc_email, user_email_subject, user_email_body;;;richtext:rte_transform[mode=ts_links], feuser, ip, useragent, visitors_country, referer_domain, referer_uri, page, mobile_device, website_language, website_language_id, browser_language, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_jscontactform_domain_model_contactform',
				'foreign_table_where' => 'AND tx_jscontactform_domain_model_contactform.pid=###CURRENT_PID### AND tx_jscontactform_domain_model_contactform.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'gender' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.gender',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'first_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.first_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'middle_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.middle_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'last_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.last_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'birthday' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.birthday',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'fax' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.fax',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'mobile' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.mobile',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'www' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.www',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'address' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.address',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'building' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.building',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'room' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.room',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'city' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'zip' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.zip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'region' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.region',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'country' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'company' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.company',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'position' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.position',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array(
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
					),
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						)
					),
					'maxitems' => 1
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'message' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.message',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'skype' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.skype',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'twitter' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.twitter',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'facebook' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.facebook',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'linkedin' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.linkedin',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'creation_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.creation_date',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'receiver_email_configuration' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_email_configuration',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'receiver_email_sent' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_email_sent',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'receiver_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_name',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'receiver_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_email',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'receiver_sender_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_sender_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_sender_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_sender_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_noreply_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_noreply_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_noreply_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_noreply_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_cc_send' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_cc_send',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'receiver_cc_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_cc_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_cc_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_cc_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_bcc_send' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_bcc_send',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'receiver_bcc_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_bcc_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_bcc_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_bcc_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiver_email_subject' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_email_subject',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'receiver_email_body' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.receiver_email_body',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'user_email_configuration' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_email_configuration',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'user_email_sent' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_email_sent',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'user_sender_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_sender_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_sender_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_sender_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_noreply_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_noreply_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_noreply_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_noreply_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_cc_send' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_cc_send',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'user_cc_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_cc_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_cc_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_cc_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_bcc_send' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_bcc_send',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'user_bcc_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_bcc_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_bcc_email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_bcc_email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user_email_subject' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_email_subject',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'user_email_body' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.user_email_body',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'feuser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.feuser',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'ip' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.ip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'useragent' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.useragent',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'visitors_country' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.visitors_country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'referer_domain' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.referer_domain',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'referer_uri' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.referer_uri',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'page' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.page',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'mobile_device' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.mobile_device',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'website_language' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.website_language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'website_language_id' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.website_language_id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'browser_language' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.browser_language',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder