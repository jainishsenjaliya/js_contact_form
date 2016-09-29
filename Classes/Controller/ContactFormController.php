<?php
namespace JS\JsContactForm\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
class ContactFormController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
	public function contactFormAction()
	{
		$GLOBALS['TSFE']->set_no_cache();

		$this->fullURL = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		$this->cObject = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');

		$this->contentObj = $this->configurationManager->getContentObject();

		$this->settings['contentID'] = md5($this->contentObj->data['uid']);

		$message = $this->contactFormService->getSessionData('message');

		$template = $this->contactFormService->missingConfiguration($this->settings);

		if ($this->request->hasArgument('contactSubmit')) {

			$data = $this->request->getArguments();
			
			if($this->settings['contentID'] ==$data['content']){

				$fieldsValue = $this->request->getArguments();
			}
		}

		$formFields = $this->contactFormService->formFields($this->settings,$fieldsValue);

		if ($this->request->hasArgument('contactSubmit')) {

			$data = $this->request->getArguments();
			
			if($this->settings['contentID'] ==$data['content']){
				
				$validate = $this->contactFormService->validate($this->settings, $data);

				if (count($validate) > 0) {

					foreach ($validate as $key => $value) {
						$formFields[$key]['error'] = 'error';
					}

					$message = array("error"=>$validate);

				}else{

					$userInformation = $this->contactFormService->userInformation($data,$formFields);

					$mailUserInformation = $this->contactFormService->mailUserInformation($userInformation, $formFields);

					$arr = array(
						'baseURL'				=> $this->request->getBaseUri(),
						'userName'				=> $userInformation['name'],
						'siteLogo'				=> $this->contactFormService->logoInMail($this->settings, $this->fullURL),
						'logoLink'				=> $logoLink = $this->settings['logoLink'] == '' ? $this->request->getBaseUri() : $this->settings['logoLink'],
						'js_contact_form_all'	=> $mailUserInformation,
						'receiverName'			=> $this->settings['receiver']['name'],
						'current_page'		  => $this->uriBuilder->getRequest()->getRequestUri(),
					);

					$variable = array_merge($userInformation, $arr);

					$user_email_body = $this->contactFormService->userEmailTemplate($variable, $this->settings);
				
					$user_email_body = $this->contactFormService->rewriteVariables($variable, $user_email_body);

					$receiverBody = $this->settings['receiver']['body'];

					$receiver_email_body	= $this->contactFormService->receiverEmailTemplate($variable, $this->settings);
				
					$receiver_email_body = $this->contactFormService->rewriteVariables($variable, $receiver_email_body);

					$userMailSent = $receiverMailSent = 0;

					$userSetting = $this->settings['user'];

					$this->settings['receiver']['sender'] = $this->contactFormService->setReceiverNameandEmail($this->settings, $userInformation);

					if ($userSetting['sendMail'] == 1 && !empty($userSetting['subject']) && 
							!empty($userInformation['email']) && filter_var($userInformation['email'], FILTER_VALIDATE_EMAIL)
							&& filter_var($userSetting['sender']['email'], FILTER_VALIDATE_EMAIL)) {

						$userMailSent = $this->contactFormService->sentMailToUser($user_email_body, $userInformation, $this->settings);
					}

					$receiverSetting = $this->settings['receiver'];

					if ($receiverSetting['sendMail'] == 1 && !empty($receiverSetting['subject']) && 
						!empty($receiverSetting['email']) && filter_var($receiverSetting['email'], FILTER_VALIDATE_EMAIL)
						&& filter_var($receiverSetting['sender']['email'], FILTER_VALIDATE_EMAIL)) {

						$receiverMailSent = $this->contactFormService->sentMailToReceiver($receiver_email_body, $userInformation, $this->settings);
					}

					$mailBody = array('receiver_email_body' => $receiver_email_body, 'user_email_body' => $user_email_body,
										'user_email_sent' => $userMailSent, 'receiver_email_sent' => $receiverMailSent,
									 );

					$marketingInformation = $this->contactFormService->marketingInformation($userInformation,$this->settings, $mailBody);

					$suc = $this->contactFormService->insertUserData($userInformation, $marketingInformation);

					if($suc == 1 && ( $userMailSent == 1 || $userInformation['email']=="" || $this->settings['user']['sendMail']==0)){

						$sessionData = array("success"=>array("successfully_contacted"=>"successfully_contacted"));

						$this->contactFormService->setSessionData('message',$sessionData);

						$link = $this->settings['thanks']['redirect']!=""?$this->settings['thanks']['redirect']:$GLOBALS['TSFE']->id;

						$this->redirectURL($link);

					}else if($suc==1){

						$sessionData = array("info"=>array("mail_not_sent"));

						$this->contactFormService->setSessionData('message',$sessionData);

						$this->redirectURL();

					}else{

						$message = array("error"=>array("data_not_inserted"));
					}
				}
			}
		}

		$assignedValues = array(
			'message'			=> $message,
			'settings'			=> $this->settings,
			'formFields'		=> $formFields,
			'template'			=> $template,
		);

		$this->view->assignMultiple($assignedValues);

		// Include Additional Data
		$this->contactFormService->includeAdditionalData($this->settings);
	}
	
	/**
	 * redirectURL
	 *
	 * @param $pageUid
	 * @param $additionalParams
	 * @return
	 */
	public function redirectURL($pageUid = "",$additionalParams = array())
	{
		$pageUid	= $pageUid !=""?$pageUid:$GLOBALS['TSFE']->id;
		$baseUri	= $this->request->getBaseUri();
		$url 		= $this->uriBuilder->reset()->setTargetPageUid($pageUid)->setArguments($additionalParams)->buildFrontendUri();
		
		$url = $pageUid>0?$baseUri.$url:$url;
				
		header('Location:' . $url); die;
	}
}