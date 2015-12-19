<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, firstname, lastname, company, url, email, phone, fax, address, zip, city, country, message, subject, page, contact_date, ip, useragent',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, firstname, lastname, company, url, email, phone, fax, address, zip, city, country, message, subject, page, contact_date, ip, useragent, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
		'firstname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.lastname',
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
		'url' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.url',
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
		'address' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.address',
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
		'city' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.city',
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
		'message' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.message',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'subject' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.subject',
			'config' => array(
				'type' => 'input',
				'size' => 48,
				'eval' => 'trim',
				'readOnly' =>1,
			),
		),
		'page' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.page',
			'config' => array (
				'type' => 'select',	
				'foreign_table' => 'pages',	
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
				'readOnly' =>1,
			)
		),
		'contact_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.contact_date',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time(),
				'readOnly' =>1,
			),
		),
		'ip' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.ip',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'eval' => 'trim',
				'readOnly' =>1,
			),
		),
		'useragent' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:js_contact_form/Resources/Private/Language/locallang_db.xlf:tx_jscontactform_domain_model_contactform.useragent',
			'config' => array(
				'type' => 'input',
				'size' => 48,
				'eval' => 'trim',
				'readOnly' =>1,
			),
		),
	),
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jscontactform_domain_model_contactform']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, firstname, lastname, company, url, email, phone, fax, address, zip, city, country, message,--div--; Extended, subject, page, contact_date, ip, useragent ';