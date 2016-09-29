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
		'searchFields' => 'name, first_name,last_name,title,email,phone,fax,mobile,www,address,city,zip,country,company,position,message,creation_date,user_email_subject,ip,useragent,page',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('js_contact_form') . 'Resources/Public/Icons/tx_jscontactform_domain_model_contactform.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, first_name,last_name,title,email,phone,fax,mobile,www,address,city,zip,country,company,position,message,creation_date,user_email_subject,ip,useragent,page',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, first_name,last_name,title,email,phone,fax,mobile,www,address,city,zip,country,company,position,message,creation_date,user_email_subject,ip,useragent,page, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.first_name',
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
		'page' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.page',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder