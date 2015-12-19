<?php
namespace JS\JsContactForm\Controller;

session_start();
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * ContactFormController
 *
 * @package js_contact_form
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ContactFormController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * contactFormRepository
	 *
	 * @var \JS\JsContactForm\Domain\Repository\ContactFormRepository
	 * @inject
	 */
	protected $contactFormRepository = NULL;

	/**
	 * contactFormService
	 *
	 * @var \JS\JsContactForm\Service\ContactFormService
	 * @inject
	 */
	protected $contactFormService = NULL;

	/**
	 * action contactForm
	 *
	 * @return void
	 */
	public function contactFormAction() {
		$this->fullURL = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		$suc = 0;
		if (isset($_SESSION['contactMessage'])) {
			$suc = $_SESSION['contactMessage'];
			unset($_SESSION['contactMessage']);
		}
		$requiredFieldsArr = $this->settings['requiredFields'];
		$fieldsArr = $this->settings['formFields'];
		$arr = $requireArr = $require = array();
		$Formfield = $this->contactFormService->missingConfiguration($this->settings);
		if ($Formfield == 1) {
			if (trim($fieldsArr) != '') {
				if (strstr($fieldsArr, ',')) {
					$arr = explode(',', $fieldsArr);
				}
				$Formfield = 1;
			} else {
				$Formfield = 0;
			}
		}
		if (trim($requiredFieldsArr) != '') {
			if (strstr($requiredFieldsArr, ',')) {
				$require = explode(',', $requiredFieldsArr);
				foreach ($require as $key => $value) {
					if ($value != '') {
						$requireArr[] = trim($value);
					}
				}
			} else {
				$requireArr[] = $requiredFieldsArr;
			}
		}
		$fields = array();
		if ($this->request->hasArgument('contactSubmit')) {
			$fieldsValue = $this->request->getArguments();
		}
		foreach ($arr as $key => $value) {
			$val = trim($value);
			if ($val != '') {
				$validate = in_array($val, $requireArr) ? 'validate' : '';
				$fields[$val] = array('field' => $val, 'validate' => $validate, 'value' => $fieldsValue[$val]);
			}
		}
		if ($this->request->hasArgument('contactSubmit')) {
			$formFields = $this->request->getArguments();
			$error = $this->contactFormService->validate($formFields, $requireArr);
			foreach ($error as $key => $value) {
				$fields[$value]['error'] = 'error';
			}
			$err = '';
			if (count($error) > 0) {
				$err = $error;
			} else {
				$_SESSION['contactMessage'] = $this->contactFormService->insertUserData($formFields, $this->settings['storagePID'], $this->settings['subjectUser']);
				$suc = 1;
			}
			// Mail sent to user and admin
			if ($suc == 1) {
				$arr = array(
					'firstname' => $formFields['firstname'],
					'lastname' => $formFields['lastname'],
					'company' => $formFields['company'],
					'url' => $formFields['url'],
					'email' => $formFields['email'],
					'phone' => $formFields['phone'],
					'fax' => $formFields['fax'],
					'address' => $formFields['address'],
					'zip' => $formFields['zip'],
					'city' => $formFields['city'],
					'country' => $formFields['country'],
					'message' => $formFields['message']
				);
				$mainLogo = 'typo3conf/ext/js_contact_form/Resources/Public/Images/logo.png';
				$logo1 = $this->settings['logoInMail'];
				if (strstr($logo1, 'www') || strstr($logo1, 'http')) {
					$logoPath = $logo1;
				} else {
					$logoPath = $this->fullURL . $logo1;
				}
				if ($this->contactFormService->checkRemoteFile($logoPath)) {
					$logo = $logoPath;
				} else {
					$logo = $this->fullURL . $mainLogo;
				}
				$arr1 = array(
					'baseURL' => $this->fullURL,
					'userName' => $formFields['firstname'] . ' ' . $formFields['lastname'],
					'siteLogo' => $logo,
					'logoLink' => $logoLink = $this->settings['logoLink'] == '' ? $this->fullURL : $this->settings['logoLink']
				);
				foreach ($arr as $key => $value) {
					if ($value != '') {
						$mailFields['mail'][] = array('field' => $key, 'value' => $value);
					}
				}
				$returnPath = $attachements = $plain = $bccName = $bccEmail = '';
				$fromName = $this->settings['senderName'];
				$fromEmail = $this->settings['senderEmail'];
				$replyToEmail = $this->settings['noreply'];
				$replyToName = $this->settings['noreplyEmail'];
				$sendMailUser = $this->settings['sendMailUser'];
				if ($sendMailUser == 1) {
					$emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
					$templateName = 'Email/mailUser.html';
					$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
					$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
					$templatePathAndFilename = $templateRootPath . $templateName;
					$emailView->setTemplatePathAndFilename($templatePathAndFilename);
					$emailView->assignMultiple($mailFields);
					$emailView->assignMultiple($arr1);
					$emailBody = $emailView->render();
					$to = $formFields['email'];
					$subject = $this->settings['subjectUser'];
					$sendHiddenCopy = $this->settings['sendHiddenCopyOfUserMail'];
					if ($sendHiddenCopy == 1 && $this->settings['bccEmail'] != '') {
						$bccName = $this->settings['bccName'];
						$bccEmail = $this->settings['bccEmail'];
					}
					if ($to != '') {
						$toArr = array(0 => array('name' => $formFields['firstname'], 'email' => $to));
						$res = $this->contactFormService->sendMail($toArr, $subject, $emailBody, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $bccName, $bccEmail, $returnPath, $attachements);
					}
				}
				$sendMailAdmin = $this->settings['sendMailAdmin'];
				if ($sendMailAdmin == 1) {
					$emailView1 = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
					$templateName = 'Email/mailAdmin.html';
					$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
					$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
					$templatePathAndFilename = $templateRootPath . $templateName;
					$emailView1->setTemplatePathAndFilename($templatePathAndFilename);
					$emailView1->assignMultiple($mailFields);
					$emailView1->assignMultiple($arr1);
					$emailBodyAdmin = $emailView1->render();
					$to = $this->settings['adminEmail'];
					$subject = $this->settings['subjectAdmin'];
					$fromName = $formFields['firstname'];
					$fromEmail = $formFields['email'];
					$sendHiddenCopyAdmin = $this->settings['sendHiddenCopyOfAdminMail'];
					if ($sendHiddenCopyAdmin == 1 && $this->settings['bccEmail'] != '') {
						$bccName = $this->settings['bccName'];
						$bccEmail = $this->settings['bccEmail'];
					}
					if ($to != '') {
						$toArr = array(0 => array('name' => $this->settings['adminName'], 'email' => $to));
						$res = $this->contactFormService->sendMail($toArr, $subject, $emailBodyAdmin, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $bccName, $bccEmail, $returnPath, $attachements);
					}
				}
				$this->cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
				$this->redirectURL($this->cObject, $GLOBALS['TSFE']->id, $this->fullURL);
			}
		}
		$this->contentObj = $this->configurationManager->getContentObject();
		$uid = $this->contentObj->data['uid'];
		$sucArr = array(
			'message' => $suc,
			'successMessage' => $this->settings['messageAfterSubmit']
		);
		$this->view->assign('message', $suc);
		$this->view->assign('success', $sucArr);
		$this->view->assign('userData', $formFields);
		$this->view->assign('errors', $err);
		$this->view->assign('formFields', $fields);
		$this->view->assign('template', $Formfield);
		// Include Additional Data
		$this->contactFormService->includeAdditionalData($this->settings);
	}

	/**
	 * redirectURL
	 *
	 * @param $cObject
	 * @param $pid
	 * @param $fullURL
	 * @param $additionalParams
	 * @return
	 */
	public function redirectURL($cObject, $pid, $fullURL, $additionalParams = '') {
		$configurations['additionalParams'] = $additionalParams;
		$configurations['returnLast'] = 'url';
		// get it as URL
		$configurations['parameter'] = $pid;
		$url = $fullURL . $cObject->typolink(NULL, $configurations);
		header('Location:' . $url);
		die;
	}

}