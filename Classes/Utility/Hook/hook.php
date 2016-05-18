<?php

/* BEGIN: include flexform */

$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$frontendpluginName = 'contactform';
$pluginSignature = strtolower($extensionName) . '_'.strtolower($frontendpluginName);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/Flexform/FlexForm.xml');

/* END: include flexform */


// Add wizard icon to the "Add new record" in backend

if (TYPO3_MODE == "BE") {

	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["JS\JsContactForm\Utility\Hook\ContentElementWizard"] =
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Utility/Hook/ContentElementWizard.php';
}

// Hook to show Plugin Information

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['jscontactform_contactform'][$_EXTKEY] =
	'EXT:' . $_EXTKEY . '/Classes/Utility/Hook/PluginInformation.php:JS\JsContactForm\Utility\Hook\PluginInformation->build';