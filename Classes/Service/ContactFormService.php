<?php
namespace JS\JsContactForm\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
 * Contact form Service class
 *
 * @package JS
 * @subpackage js_contact_form
 * (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * 
 */

class ContactFormService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @var string
	 */
	protected $nameCompatFormat = '%1$s %3$s';	

	/**
	 * @var bool
	 */
	protected $storeCompatName = true;

	/**
	 * captchaService
	 *
	 * @var \JS\JsContactForm\Service\CaptchaService
	 * @inject
	 */
	protected $captchaService = NULL;

	/**
	 * settingsService
	 *
	 * @var \JS\JsContactForm\Service\SettingsService
	 * @inject
	 */
	protected $settingsService = NULL;

	/**
	 * configuration
	 *
	 * @var \JS\JsContactForm\Service\Configuration
	 * @inject
	 */
	protected $configuration = NULL;

	/**
	 * email
	 *
	 * @var \JS\JsContactForm\Service\Email
	 * @inject
	 */
	protected $email = NULL;

	/**
	 * template
	 *
	 * @var \JS\JsContactForm\Service\Template
	 * @inject
	 */
	protected $template = NULL;

	/**
	 * formFields
	 *
	 * @param $fieldsValue
	 * @return
	 */
	 
	function formFields($fieldsValue = array())
	{
		$settings = $this->settingsService->getSettings();

		$arr = $this->configuration->dataExplode($settings['fields']['form']);

		$requireArr = $this->configuration->dataExplode($settings['fields']['required']);

		$fields = array();

		foreach ($arr as $key => $value) {

			if (trim($value) != '') {

				$validate 		= in_array($value, $requireArr) ? 'validate' : '';

				$type			= $settings['fields']['type'][$value];

				$filedType		= !empty($type)?$type:"Input";

				$data = array();

				if(strtolower($filedType)=="radio"){
					$data = array('data' => $this->configuration->dataExplode($settings['fields'][$value]));
				}

				$arr = array('field' => $value, 'validate' => $validate, 'value' => $fieldsValue[$value], 'type' => ucfirst($filedType));

				$fields[$value] = array_merge($arr, $data);
			}
		}

		return $fields;
	}
	
	/**
	 * validate
	 *
	 * @param $formFields
	 * @return
	 */
	 
	function validate($formFields)
	{
		$settings =  $this->settingsService->getSettings();
		
		$require = $this->configuration->dataExplode($settings['fields']['required']);

		$error = array();

		foreach ($require as $key => $value) {

			if(array_key_exists($value, $formFields)){

				if($formFields[$value]==""){
					
					$error[$value] = "blank_".$value;
					
				}else if($value=="email"){
					
					if (!filter_var($formFields[$value], FILTER_VALIDATE_EMAIL)) {
						$error[$value] = "valid_".$value;
					}
					
				}else if($value=="zip"){
					
					if(!is_numeric($formFields[$value]) || strlen($formFields[$value])>6 ){
						 $error[$value] = "valid_".$value;
					}
					
				}else if($value=="url"){

					if (!filter_var($formFields[$value], FILTER_VALIDATE_URL)) {
						$error[$value] = "valid_".$value;
					}
				}else if($value=="captcha"){
					
					if(!$this->captchaService->validCode($formFields[$value])){
						 $error[$value] = "valid_".$value;
					}
				}
			}
		}
		return $error;
	}

 	/**
	 * userInformation
	 *
	 * @param $data
	 * @param $formFields
	 * @return
	 */
	
	function userInformation($data, $formFields)
	{
		$userInfo = array();

		foreach ($data as $key => $value) {
			if(array_key_exists($key, $formFields)){
				if($value!="" && $key !="captcha"){
					$userInfo[$key] = $value;
				}
			}
		}

		$var = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['js_contact_form']);

		if(isset($var['storeCompatName'])){
			$isCombinedName = $var['storeCompatName'];
		}else{
			$isCombinedName = $this->getStoreCompatName();	
		}

		if((!array_key_exists('name', $userInfo) || trim($userInfo['name'])=="") && $isCombinedName ==1){

			if((string)$var['nameCompatFormat'] && $var['nameCompatFormat']!=""){
				$format = $var['nameCompatFormat'];
			}else{
				$format = $this->getNameCompatFormat();	
			}

			$combinedName = trim(sprintf(
				$format,
				$formFields['first_name']['value'],
				$formFields['middle_name']['value'],
				$formFields['last_name']['value']
			));

			if (!empty($combinedName)) {
				$userInfo['name'] = $combinedName;
			}
		}

		return $userInfo;
	}

	/**
	 * @return string
	 */
	public function getNameCompatFormat()
	{
		return $this->nameCompatFormat;
	}

	/**
	 * @return string
	 */
	public function getStoreCompatName()
	{
		return $this->storeCompatName;
	}

	/**
	 * mailUserInformation
	 *
	 * @param $userInformation
	 * @param $formFields
	 * @param $templateRootPath
	 * @return
	 */
	
	function mailUserInformation($userInformation, $formFields)
	{
		foreach ($userInformation as $key => $value)
		{
			if(array_key_exists($key, $formFields)){

				$userInfo[$key]['value']	= $value;
				$userInfo[$key]['type']		= $formFields[$key]['type'];
			}
		}

		$variables['mail'] = $userInfo;

		$templateName = 'Email/UserInformation.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}

 	/**
	 * userEmailTemplate
	 *
	 * @param $variables
	 * @return
	 */
	
	function userEmailTemplate($variables)
	{
		$settings = $this->settingsService->getSettings();

		$templateName = $settings['user']['emailTemplate']==""?$settings['user']['emailTemplate']:'Email/User.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}

	/**
	 * receiverEmailTemplate
	 *
	 * @param $variables
	 * @return
	 */
	
	function receiverEmailTemplate($variables)
	{
		$settings = $this->settingsService->getSettings();

		$templateName = $settings['receiver']['emailTemplate']==""?$settings['receiver']['emailTemplate']:'Email/Receiver.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}

	/**
	 * rewriteVariables
	 *
	 * @param $variable
	 * @param $content
	 * @return
	 */
	
	function rewriteVariables($variable, $content)
	{
		foreach ($variable as $key => $value) {
			$content = str_replace("{".$key."}", $value, $content);
		}

		return $content;
	}

 	/**
	 * setReceiverEmailandName
	 *
	 * @param $userInformation
	 * @return
	 */
	
	function setReceiverNameandEmail($userInformation){

		$settings	= $this->settingsService->getSettings();

		$sender		= $settings['receiver']['sender'];

		$tempName	= trim($sender['name']);

		foreach ($userInformation as $key => $value) {
			$tempName = str_replace("{".$key."}", $value, $tempName);
		}

		if($tempName == ""){
			$tempName = $userInformation['name'];
		}

		$fromName = $tempName;

		$fromEmail	= trim($sender['email']);

		if($fromEmail=="{email}" || $fromEmail==""){
			$fromEmail = !empty($userInformation['email'])?$userInformation['email']:"";
		}
		
		return array("name"=>$fromName, "email"=>$fromEmail);
	}

	/**
	 * sentMailToUser
	 *
	 * @param $mailContent
	 * @param $userInformation
	 * @param $settings
	 * @return
	 */
	
	public function sentMailToUser($mailContent, $userInformation, $settings){

		/*$variables['mail_content'] = $mailContent;

		$templateName = 'Email/HTMLFormat.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		$mailContent = $view->render();*/
		
		$returnPath = $attachements = $plain = $ccName = $ccEmail = $bccName = $bccEmail = $sentMail = '';

		$to 			= $userInformation['email'];
		
		$subject 		= $settings['user']['subject'];
		
		$fromName		= $settings['user']['sender']['name'];
		$fromEmail		= $settings['user']['sender']['email'];
		
		$replyToEmail	= $settings['user']['noreply']['name'];
		$replyToName	= $settings['user']['noreply']['email'];

		$sendCarbonCopy = $settings['user']['bcc']['sendMail'];

		if ($sendCarbonCopy == 1 && $settings['receiver']['cc']['email'] != '') {
			$ccName 	= $settings['user']['cc']['name'];
			$ccEmail	= $settings['user']['cc']['email'];
		}		

		$sendHiddenCopy = $settings['user']['bcc']['sendMail'];

		if ($sendHiddenCopy == 1 && $settings['user']['bcc']['email'] != '') {
			$bccName 	= $settings['user']['bcc']['name'];
			$bccEmail	= $settings['user']['bcc']['email'];
		}

		if ($to != '') {
			
			$toArr = array(0 => array('name' => $userInformation['name'], 'email' => $to));

			$sentMail = $this->email->sendMail($toArr, $subject, $mailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $ccName, $ccEmail, $bccName, $bccEmail, $returnPath, $attachements);

		}
		return $sentMail;
	}

	/**
	 * sentMailToReceiver
	 *
	 * @param $mailContent
	 * @param $userInformation
	 * @param $settings
	 * @return
	 */
	
	public function sentMailToReceiver($mailContent, $userInformation, $settings){

		/*$variables['mail_content'] = $mailContent;

		$templateName = 'Email/HTMLFormat.html';

		$view = $this->template->getView($templateName);

		$view->assignMultiple($variables);
		
		$mailContent = $view->render();*/
		
		$returnPath = $attachements = $plain = $ccName = $ccEmail = $bccName = $bccEmail = $sentMail = '';

		$to 			= $settings['receiver']['email'];

		$subject		= $settings['receiver']['subject'];

		$sender			= $settings['receiver']['sender'];

		$fromName 		= $settings['receiver']['sender']['name'];
		$fromEmail 		= $settings['receiver']['sender']['email'];

		$replyToEmail	= $settings['receiver']['noreply']['name'];
		$replyToName	= $settings['receiver']['noreply']['email'];

		$sendCarbonCopy = $settings['receiver']['bcc']['sendMail'];

		if ($sendCarbonCopy == 1 && $settings['receiver']['cc']['email'] != '') {
			$ccName 	= $settings['receiver']['cc']['name'];
			$ccEmail	= $settings['receiver']['cc']['email'];
		}
		
		$sendHiddenCopy = $settings['receiver']['bcc']['sendMail'];

		if ($sendHiddenCopy == 1 && $settings['receiver']['bcc']['email'] != '') {
			$bccName 	= $settings['receiver']['bcc']['name'];
			$bccEmail	= $settings['receiver']['bcc']['email'];
		}

		if ($to != '') {

			$toArr = array(0 => array('name' => $settings['receiver']['name'], 'email' => $to));
			$sentMail = $this->email->sendMail($toArr, $subject, $mailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $ccName, $ccEmail, $bccName, $bccEmail, $returnPath, $attachements);
		}

		return $sentMail;
	}

 	/**
	 * marketingInformation
	 *
	 * @param $settings
	 * @param $userInformation
	 * @param $mailBody
	 * @return
	 */
	
	function marketingInformation($settings, $userInformation, $mailBody){

		$user = 0;
		
		if ((int) $GLOBALS['TSFE']->fe_user->user['uid'] > 0) {
			$user = (int) $GLOBALS['TSFE']->fe_user->user['uid'];
		}

		$marketingInfo = array(
			
				'pid' 				=> $settings['main']['storagePID']==""?$GLOBALS['TSFE']->id:$settings['main']['storagePID'],
				'tstamp'			=> time(),
				'crdate'			=> time(),
				'creation_date'		=> time(),

				'receiver_email_configuration'	=> $settings['receiver']['sendMail'],
				'receiver_email_sent' 			=> $mailBody['receiver_email_sent'],
				
				'receiver_name'					=> $settings['receiver']['name'],
				'receiver_email'				=> $settings['receiver']['email'],
				'receiver_sender_name'			=> $settings['receiver']['sender']['name'],
				'receiver_sender_email'			=> $settings['receiver']['sender']['email'],
				'receiver_noreply_name'			=> $settings['receiver']['noreply']['name'],
				'receiver_noreply_email'		=> $settings['receiver']['noreply']['email'],
				'receiver_cc_send'				=> $settings['receiver']['cc']['sendMail'],
				'receiver_cc_name'				=> $settings['receiver']['cc']['name'],
				'receiver_cc_email'				=> $settings['receiver']['cc']['email'],
				'receiver_bcc_send'				=> $settings['receiver']['bcc']['sendMail'],
				'receiver_bcc_name'				=> $settings['receiver']['bcc']['name'],
				'receiver_bcc_email'			=> $settings['receiver']['bcc']['email'],

				'receiver_email_subject'		=> $settings['receiver']['subject'],				
				'receiver_email_body'			=> preg_replace('!\s+!smi', ' ', $mailBody['receiver_email_body']),

				'user_email_configuration'	=> $settings['user']['sendMail'],
				'user_email_sent' 			=> $mailBody['user_email_sent'],
				
				'user_sender_name'			=> $settings['user']['sender']['name'],
				'user_sender_email'			=> $settings['user']['sender']['email'],
				'user_noreply_name'			=> $settings['user']['noreply']['name'],
				'user_noreply_email'		=> $settings['user']['noreply']['email'],
				'user_cc_send'				=> $settings['user']['cc']['sendMail'],
				'user_cc_name'				=> $settings['user']['cc']['name'],
				'user_cc_email'				=> $settings['user']['cc']['email'],
				'user_bcc_send'				=> $settings['user']['bcc']['sendMail'],
				'user_bcc_name'				=> $settings['user']['bcc']['name'],
				'user_bcc_email'			=> $settings['user']['bcc']['email'],
				
				'user_email_subject'		=> $settings['user']['subject'],
				'user_email_body'			=> preg_replace('!\s+!smi', ' ', $mailBody['user_email_body']),

				'feuser'				=> $user,
				'ip'					=> $this->configuration->geIPAddress(),
				'useragent'	 			=> GeneralUtility::getIndpEnv('HTTP_USER_AGENT'),
				'visitors_country'		=> $this->configuration->getLocationInfoByIp($this->configuration->geIPAddress()),
				'referer_domain'		=> GeneralUtility::getIndpEnv('TYPO3_SITE_URL'),
				'referer_uri'			=> GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'),
				'page'					=> $GLOBALS['TSFE']->id,
				'mobile_device'			=> $this->configuration->is_mobile(),
				'website_language'		=> $GLOBALS['TSFE']->config['config']['language'],
				'website_language_id'	=> $GLOBALS['TSFE']->sys_language_uid,
				'browser_language'		=> GeneralUtility::getIndpEnv('HTTP_ACCEPT_LANGUAGE'),
			);

		return $marketingInfo;
	}
	
 	/**
	 * replaceNullValue2Blank
	 *
	 * @param $data
	 * @return
	 */
	
	function replaceNullValue2Blank($data){

		$dataArray = array();

		foreach ($data as $key => $value) {
			if(is_array($value)){
				foreach ($value as $key1 => $value1) {
					if(is_array($value1)){
						foreach ($value1 as $key2 => $value2) {
							if(is_array($value2)){
								foreach ($value2 as $key3 => $value3) {
									if(!empty($value3)){
										$dataArray[$key][$key1][$key2][$key3] = $value3;
									}else{
										$dataArray[$key][$key1][$key2][$key3] = '';
									}
								}
							}else{
								if(!empty($value2)){
									$dataArray[$key][$key1][$key2] = $value2;
								}else{
									$dataArray[$key][$key1][$key2] = '';
								}
							}
						}
					}else{
						if(!empty($value1)){
							$dataArray[$key][$key1] = $value1;
						}else{
							$dataArray[$key][$key1] = '';
						}
					}
				}
			}else{
				if(!empty($value)){
					$dataArray[$key] = $value;
				}else{
					$dataArray[$key] = '';
				}
			}
		}

		return $dataArray;
	}	

 	/**
	 * logoInMail
	 *
	 * @param $settings
	 * @param $fullURL
	 * @return
	 */
	
	function logoInMail($settings, $fullURL)
	{

		$mainLogo = 'typo3conf/ext/js_contact_form/Resources/Public/Images/logo.png';

		$logoInMail = $settings['logoInMail'];

		if (strstr($logoInMail, 'www') || strstr($logoInMail, 'http')) {
			$logoPath = $logoInMail;
		} else {
			$logoPath = $fullURL . $logoInMail;
		}

		if ($this->configuration->checkRemoteFile($logoPath)) {
			$logo = $logoPath;
		} else {
			$logo = $fullURL . $mainLogo;
		}
		return $logo;
	}
}