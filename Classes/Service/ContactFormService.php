<?php
namespace JS\JsContactForm\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/*
 *  (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
*/

class ContactFormService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * Extension Key
	 */
	public static $extKey = 'JsContactForm';

	/**
	 * @var string
	 */
	protected $nameCompatFormat = '%1$s %3$s';	

	/**
	 * @var bool
	 */
	protected $storeCompatName = true;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 */
	protected $configurationManager;

	/**
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $manager
	 */
	public function injectConfigurationManager(ConfigurationManagerInterface $manager)
	{
		$this->configurationManager = $manager;
	}	

	/**
	 * contactFormRepository
	 *
	 * @var \JS\JsContactForm\Domain\Repository\ContactFormRepository
	 * @inject
	 */
	protected $contactFormRepository = NULL;
	
	/**
	 * missingConfiguration
	 *
	 * @param $settings
	 * @return
	 */
	 
	function missingConfiguration($settings)
	{
		if($settings['configuration']!=1){
			return array("error"=>'include_template');
		}

		$mandatoryArr  = array("name","email");

		if($settings['receiver']['sendMail']==1){
			foreach ($settings['receiver'] as $key => $value) {
				if(in_array($key, $mandatoryArr)){
					if($this->getTrim($value)==""){
						return array("error"=>'receiver.missing_configuration');
					}
				}
			}
			if($settings['receiver']['cc']['sendMail']==1){
				foreach ($settings['receiver']['cc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if($this->getTrim($value)==""){
							return array("error"=>'receiver.cc.missing_configuration');
						}
					}
				}
			}
			if($settings['receiver']['bcc']['sendMail']==1){
				foreach ($settings['receiver']['bcc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if($this->getTrim($value)==""){
							return array("error"=>'receiver.bcc.missing_configuration');
						}
					}
				}
			}
		}

		if($settings['user']['sendMail']==1){
			foreach ($settings['user']['sender'] as $key => $value) {
				if(in_array($key, $mandatoryArr)){
					if($this->getTrim($value)==""){
						return array("error"=>'user.missing_configuration');
					}
				}
			}
			if($settings['user']['cc']['sendMail']==1){
				foreach ($settings['user']['cc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if($this->getTrim($value)==""){
							return array("error"=>'user.cc.missing_configuration');
						}
					}
				}
			}
			if($settings['user']['bcc']['sendMail']==1){
				foreach ($settings['user']['bcc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if($this->getTrim($value)==""){
							return array("error"=>'user.bcc.missing_configuration');
						}
					}
				}
			}
		}

		if ($this->getTrim($settings['fields']['form']) == '') {
			return array("error"=>'missing_field_configuration');
		}
		
		if(!isset($settings['logoInMail'])){
			return 0;
		}
		
		return 1;
	}


	/**
	 * validate
	 *
	 * @param $settings
	 * @param $formFields
	 * @return
	 */
	 
	function validate($settings, $formFields)
	{
		$require = $this->dataExplode($settings['fields']['required']);

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
				}
			}
		}
		return $error;
	}

	/**
	 * formFields
	 *
	 * @param $settings
	 * @param $fieldsValue
	 * @return
	 */
	 
	function formFields($settings,$fieldsValue = array())
	{
		$arr = $this->dataExplode($settings['fields']['form']);

		$requireArr = $this->dataExplode($settings['fields']['required']);

		$fields = array();

		foreach ($arr as $key => $value) {
			if ($this->getTrim($value) != '') {

				$validate 		= in_array($value, $requireArr) ? 'validate' : '';

				$type			= $settings['fields']['type'][$value];

				$filedType		= !empty($type)?$type:"Input";

				$data = array();

				if(strtolower($filedType)=="radio"){
					$data = array('data' => $this->dataExplode($settings['fields'][$value]));
				}

				$arr = array('field' => $value, 'validate' => $validate, 'value' => $fieldsValue[$value], 'type' => ucfirst($filedType));

				$fields[$value] = array_merge($arr, $data);
			}
		}

		return $fields;
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
				if($value!=""){
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
	 * setReceiverEmailandName
	 *
	 * @param $settings
	 * @param $userInformation
	 * @return
	 */
	
	function setReceiverNameandEmail($settings, $userInformation){

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
			$fromEmail = $userInformation['email'];
		}
		
		return array("name"=>$fromName, "email"=>$fromEmail);

	}	

 	/**
	 * marketingInformation
	 *
	 * @param $userInformation
	 * @param $settings
	 * @param $mailBody
	 * @return
	 */
	
	function marketingInformation($userInformation, $settings, $mailBody){

		$marketingInfo = array(
			
				'pid' 				=> $settings['main']['storagePID']==""?$GLOBALS['TSFE']->id:$settings['main']['storagePID'],
				'tstamp'			=> time(),
				'crdate'			=> time(),
				'creation_date'		=> time(),

				
				'user_email_subject'		=> $settings['user']['subject'],

				'ip'					=> $this->geIPAddress(),
				'useragent'	 			=> GeneralUtility::getIndpEnv('HTTP_USER_AGENT'),
				'page'					=> $GLOBALS['TSFE']->id
			);

		return $marketingInfo;
	}
	
 	/**
	 * dataExplode
	 *
	 * @param $data
	 * @return
	 */
	
	function dataExplode($data){

		if ($this->getTrim($data) != '') {
			return GeneralUtility::trimExplode(',', $data, true);
		}

		return '';
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

		$view = $this->getViewTemplate($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}


 	/**
	 * userEmailTemplate
	 *
	 * @param $variables
	 * @param $settings
	 * @return
	 */
	
	function userEmailTemplate($variables, $settings)
	{
		$templateName = $settings['user']['emailTemplate']==""?$settings['user']['emailTemplate']:'Email/User.html';

		$view = $this->getViewTemplate($templateName);

		$view->assignMultiple($variables);
		
		return $view->render(); 
	}


 	/**
	 * receiverEmailTemplate
	 *
	 * @param $variables
	 * @param $settings
	 * @return
	 */
	
	function receiverEmailTemplate($variables, $settings)
	{
		$templateName = $settings['receiver']['emailTemplate']==""?$settings['receiver']['emailTemplate']:'Email/Receiver.html';

		$view = $this->getViewTemplate($templateName);

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

		if ($this->checkRemoteFile($logoPath)) {
			$logo = $logoPath;
		} else {
			$logo = $fullURL . $mainLogo;
		}
		return $logo;
	}

	/**
	 * getViewTemplate
	 *
	 * @param string $templateName [ i.e Email/Template.html]
	 * @param string $format
	 * @return \TYPO3\CMS\Fluid\View\StandaloneView
	 */
	
	function getViewTemplate($templateName, $format = 'html')
	{

		$view = GeneralUtility::makeInstance('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$view->setFormat($format);
		$view->getRequest()->setControllerExtensionName('js_contact_form');

		$configuration = $this->configurationManager->getConfiguration(
							ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
					);

		$templateRootPath	= GeneralUtility::getFileAbsFileName($configuration['view']['templateRootPaths'][0]);

		$templatePathAndFilename = $templateRootPath . $templateName;
		
		$view->setTemplatePathAndFilename($templatePathAndFilename);

		return $view;
	}

 	/**
	 * insertUserData
	 *
	 * @param $userInformation
	 * @param $marketingInformation
	 * @return
	 */
	
	function insertUserData($userInformation,$marketingInformation){

		$insertArray = array_merge($userInformation, $marketingInformation);

		return $this->contactFormRepository->insertUserData($insertArray);
	}
	
 	/**
	 * includeAdditionalData
	 *
	 * @param $settings
	 * @return
	 */
	
	function includeAdditionalData($settings)
	{
		// Inlcude JS

		$javascript = $settings['additional']['javascript'];

		if(!empty($javascript['jQueryLib']['uri']) && $javascript['jQueryLib']['include']==1){

			$jQueryLib = '<script src="'.$javascript['jQueryLib']['uri'].'" type="text/javascript"></script>';

			if($javascript['jQueryLib']['includeInFooter']==1){
				$GLOBALS['TSFE']->additionalFooterData['JsContactForm.jQueryLib'] = $jQueryLib;
			}else{
				$GLOBALS['TSFE']->additionalHeaderData['JsContactForm.jQueryLib'] = $jQueryLib;	
			}
		}

		if(!empty($javascript['validation']['uri']) && $javascript['validation']['include']==1){

			$ui	= '';
			if(!empty($javascript['ui']['uri'])){
				$ui = '<script src="'.$javascript['ui']['uri'].'" type="text/javascript"></script>';
			}

			$validation = $ui.'<script src="'.$javascript['validation']['uri'].'" type="text/javascript"></script>';

			if($javascript['validation']['includeInFooter']==1){
				$GLOBALS['TSFE']->additionalFooterData['JsContactForm.validation'] = $validation;
			}else{
				$GLOBALS['TSFE']->additionalHeaderData['JsContactForm.validation'] = $validation;	
			}
		}

		// Inlcude CSS

		$css = $settings['additional']['css'];

		if(!empty($css['basic']['uri'])){
			$basicCSS = '<link rel="stylesheet" href="'.$css['basic']['uri'].'" type="text/css" media="all" />';
		}
		if(!empty($css['fancy']['uri'])){
			$fancyCSS = '<link rel="stylesheet" href="'.$css['fancy']['uri'].'" type="text/css" media="all" />';
		}
		if(!empty($css['responsive']['uri'])){
			$responsiveCSS = '<link rel="stylesheet" href="'.$css['responsive']['uri'].'" type="text/css" media="all" />';
		}
		
		$additionalDataCSS = $css['fancy']['include']==1?$fancyCSS:$basicCSS;
		
		if($css['responsive']['include']==1){
			$additionalDataCSS .= $responsiveCSS;
		}

		if($css['includeInFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['JsContactForm.CSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['JsContactForm.CSS'] = $additionalDataCSS;	
		}
	}

 	/**
	 * Set a contactForm session (don't overwrite existing sessions)
	 *
	 * @param string $key A session name
	 * @param array $data Values to save
	 * @param \bool $overwrite Overwrite existing values
	 * @return void
	 */
	
	function setSessionData($key, $data, $overwrite = FALSE)
	{
		$GLOBALS['TSFE']->fe_user->setKey('ses', $key, $data);
		$GLOBALS["TSFE"]->fe_user->sesData_change = true;
		$GLOBALS["TSFE"]->fe_user->storeSessionData();
	}

 	/**
	 * Read a contactForm session
	 *
	 * @param \string $key A session name
	 * @return \string\Array Values from session
	 */
	
	function getSessionData($key = '')
	{
		if (isset($GLOBALS['TSFE']->fe_user->sesData[$key])) {

			$sessionData = $GLOBALS['TSFE']->fe_user->sesData[$key];

			if($key=="message"){
				$GLOBALS['TSFE']->fe_user->setKey('ses', $key, NULL);
			}

			return $sessionData;
		}
		return '';
	}

	/**
	 * geIPAddress
	 *
	 * @return
	 */
	
	function geIPAddress()
	{
		if(!empty($_SERVER['TYPO3_DB']))
		{
			$ip = GeneralUtility::getIndpEnv('HTTP_CLIENT_IP');			// Check ip from share internet
				
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		 	
			$ip = GeneralUtility::getIndpEnv('HTTP_X_FORWARDED_FOR');	//to check ip is pass from proxy
				
		}else{
			$ip = GeneralUtility::getIndpEnv('REMOTE_ADDR');
		}
		return $ip;
	}
	
	/**
	 * checkRemoteFile
	 *
	 * @param $url
	 * @return
	 */
	 
	function checkRemoteFile($url)
	{
		if  (in_array  ('curl', get_loaded_extensions())) {

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_NOBODY, 1);
			curl_setopt($ch, CURLOPT_FAILONERROR, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			if(curl_exec($ch)!==FALSE){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/**
	 * getTrim
	 *
	 * @param $val
	 * @return
	 */
	
	public function getTrim($val){
		return trim($val);
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

		$view = $this->getViewTemplate($templateName);

		$view->assignMultiple($variables);
		
		$mailContent = $view->render(); 
		*/
		
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

			$sentMail = $this->sendMail($toArr, $subject, $mailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $ccName, $ccEmail, $bccName, $bccEmail, $returnPath, $attachements);

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
		/*
		$variables['mail_content'] = $mailContent;

		$templateName = 'Email/HTMLFormat.html';

		$view = $this->getViewTemplate($templateName);

		$view->assignMultiple($variables);
		
		$mailContent = $view->render(); 
		*/
		
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
			$sentMail = $this->sendMail($toArr, $subject, $mailContent, $plain, $fromEmail, $fromName, $replyToEmail, $replyToName, $ccName, $ccEmail, $bccName, $bccEmail, $returnPath, $attachements);
		}

		return $sentMail;
	}
	
	
 	/**
	 * sendMail
	 *
	 * @param $to
	 * @param $subject
	 * @param $html
	 * @param $plain
	 * @param $fromEmail
	 * @param $fromName
	 * @param $replyToEmail
	 * @param $replyToName
	 * @param $ccName
	 * @param $ccEmail
	 * @param $bccName
	 * @param $bccEmail
	 * @param $returnPath
	 * @param $attachements
	 * @return
	 */
	
 	public static function sendMail($to, $subject, $html, $plain, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $ccName = '', $ccEmail = '', $bccName = '', $bccEmail = '', $returnPath = '', $attachements = array()) {
	  		
		// Make instance of swiftmailer
		$message = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		   
		// From
		if ($fromEmail) {
			$message->setFrom(array($fromEmail => $fromName));
		}
		 
		// To
		$recipients = array();
		if (is_array($to)) {
			foreach ($to as $pair) {
				if (GeneralUtility::validEmail($pair['email'], false)) {
					if (trim($pair['name'])) {
						$recipients[$pair['email']] = $pair['name'];
					} else {
						$recipients[] = $pair['email'];
					}
				}
			}
		} else {
			$recipients[] = $to;
		}
		 
		if (!count($recipients)) {
			return false;
		}
		 
		$message->setTo($recipients);
		 
		// Subject
		$message->setSubject($subject);
		 
		// HTML
		$message->setBody($html, 'text/html', 'utf-8');
		 
		// Plain
		if ($plain) {
			$message->addPart($plain, 'text/plain', 'utf-8');
		}
		 
		// Return Path
		if (trim($returnPath)) {
			$message->setReturnPath($returnPath);
		}

		// CC
		if ($ccEmail) {
			$message->setCc(array($ccEmail => $ccName));
		}

		// BCC
		if ($bccEmail) {
			$message->setBcc(array($bccEmail => $bccName));
		}
		 
		// Reply To
		if (trim($replyToEmail) && GeneralUtility::validEmail($replyToEmail)) {
			if (trim($replyToName)) {
				$message->setReplyTo(array($replyToEmail => $replyToName));
			} else {
				$message->setReplyTo(array($replyToEmail));
			}
		}
		 
		// Attachements
		if (count($attachements)>0 && is_array($attachements)) {
			foreach ($attachements as $file => $name) {
				if (file_exists($file)) {
					if (trim($name)) {
						$message->attach(\Swift_Attachment::fromPath($file)->setFilename($name));
					} else {
						$message->attach(Swift_Attachment::fromPath($file));
					}
				}
			}
		}
		 
		// Mail Send
		$message->send();

		return $message->isSent();
	}


	/**
	 * getLocationInfoByIp
	 *
	 * @param $ipAddress
	 * @return string Country code
	 */
	function getLocationInfoByIp($ipAddress){

		if ($ipAddress === NULL) {
			$ipAddress = GeneralUtility::getIndpEnv('REMOTE_ADDR');
		}

		$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ipAddress));	
		
		if($ip_data && $ip_data->geoplugin_countryName != null){
			return	$ip_data->geoplugin_countryCode;
			$city	= $ip_data->geoplugin_city;
		}
		return '';
	}

}