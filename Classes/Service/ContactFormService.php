<?php
namespace JS\JsContactForm\Service;

/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  Jainish Senjaliya <jainish.online@gmail.com>
*/

class ContactFormService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * contactFormRepository
	 *
	 * @var \JS\JsContactForm\Domain\Repository\ContactFormRepository
	 * @inject
	 */
	protected $contactFormRepository;
	
 	/**
	 * insertUserData
	 *
	 * @param $userData
	 * @param $storagePID
	 * @return
	 */
	
	function insertUserData($userData,$storagePID,$subjectUser)
	{

		$insertArray = array(
						'pid' 			=> $storagePID,
						'tstamp'		=> time(),
						'crdate'		=> time(),
						'firstname'		=> $userData['firstname']==""?"":$userData['firstname'],
						'lastname'		=> $userData['lastname']==""?"":$userData['lastname'],
						'company'		=> $userData['company']==""?"":$userData['company'],
						'url'			=> $userData['url']==""?"":$userData['url'],
						'email'			=> $userData['email']==""?"":$userData['email'],
						'phone'			=> $userData['phone']==""?"":$userData['phone'],
						'fax'			=> $userData['fax']==""?"":$userData['fax'],
						'address'		=> $userData['address']==""?"":$userData['address'],
						'zip'			=> $userData['zip']==""?"":$userData['zip'],
						'city'			=> $userData['city']==""?"":$userData['city'],
						'country'		=> $userData['country']==""?"":$userData['country'],
						'message'		=> $userData['message']==""?"":$userData['message'],
						'subject'		=> $subjectUser,
						'page'			=> $GLOBALS['TSFE']->id,
						'contact_date'	=> time(),
						'ip'			=> $this->geIPAddress(),
						'useragent'		=> \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_USER_AGENT'),
					);
					
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
		$additionalDataJS = $additionalDataCSS = "";
		
		if($settings['jQueryLib']==1){
			$additionalDataJS .= '<script src="typo3conf/ext/js_contact_form/Resources/Public/Script/jquery.min.js" type="text/javascript"></script>';
		}
		
		if($settings['jQueryValidation']==1){
			$additionalDataJS .= '<script src="typo3conf/ext/js_contact_form/Resources/Public/Script/jquery-ui.js" type="text/javascript"></script><script src="typo3conf/ext/js_contact_form/Resources/Public/Script/JqueryValidations.js" type="text/javascript"></script>';
		}
		
		$css = $settings['fancyCSS']==1?'fancy':'basic';
		
		$additionalDataCSS .= '<link rel="stylesheet" href="typo3conf/ext/js_contact_form/Resources/Public/Css/'.$css.'.css" type="text/css" media="all" />';
		
		if($settings['responsiveLayout']==1){
			$additionalDataCSS .= '<link rel="stylesheet" href="typo3conf/ext/js_contact_form/Resources/Public/Css/responsiveLayout.css" type="text/css" media="all" />';
		}
		
		if($settings['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['9149'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['9149'] = $additionalDataJS;	
		}
		
		if($settings['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['812'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['812'] = $additionalDataCSS;	
		}
		
	}

	/**
	 * validate
	 *
	 * @param $formFields
	 * @param $require
	 * @return
	 */
	 
	function validate($formFields,$require)
	{
		$error = array();

		foreach ($require as $key => $value) {
			
			if($formFields[$value]==""){
				
				$error["blank_".$value] = $value;
				
			}else if($value=="email"){
				
				if (!filter_var($formFields[$value], FILTER_VALIDATE_EMAIL)) {
					$error["valid_".$value] = $value;
				}
				
			}else if($value=="zip"){
				
				if(!is_numeric($formFields[$value]) || strlen($formFields[$value])>6 ){
					 $error["valid_".$value] = $value;
				}
				
			}else if($value=="url"){
				
				if(!$this->checkRemoteFile($formFields[$value])){
					 $error["valid_".$value] = $value;
				}
			}
		}
		return $error;
	}
	
	
	/**
	 * missingConfiguration
	 *
	 * @param $settings
	 * @return
	 */
	 
	function missingConfiguration($settings)
	{
		$mandatoryArr  = array("senderName","senderEmail","adminName","adminEmail","subjectUser");
		
		foreach ($settings as $key => $value) {
			
			if(in_array($key, $mandatoryArr)){
				
				if($value==""){
					return 2;
				}
			}
		}
		
		if(!isset($settings['logoInMail'])){
			return 0;
		}
		
		return 1;
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
			$ip = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_CLIENT_IP');			// Check ip from share internet
				
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		 	
			$ip = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_X_FORWARDED_FOR');	//to check ip is pass from proxy
				
		}else{
			$ip = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('REMOTE_ADDR');
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
	 * @param $bccName
	 * @param $bccEmail
	 * @param $returnPath
	 * @param $attachements
	 * @return
	 */
	
 	public static function sendMail($to, $subject, $html, $plain, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $bccName = '', $bccEmail = '', $returnPath = '', $attachements = array()) {
	  		
		// Make instance of swiftmailer
		$message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		   
		// From
		if ($fromEmail) {
			$message->setFrom(array($fromEmail => $fromName));
		}
		 
		// To
		$recipients = array();
		if (is_array($to)) {
			foreach ($to as $pair) {
				if (\TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($pair['email'], false)) {
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

		// Bcc
		if ($bccEmail) {
			$message->setBcc(array($bccEmail => $bccName));
		}
		 
		// Reply To
		if (trim($replyToEmail) && \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($replyToEmail)) {
			if (trim($replyToName)) {
				$message->setReplyTo(array($replyToEmail => $replyToName));
			} else {
				$message->setReplyTo(array($replyToEmail));
			}
		}
		 
		// Attachements
		if (count($attachements)>0) {
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
		return  $message->send();
	}
}

?>