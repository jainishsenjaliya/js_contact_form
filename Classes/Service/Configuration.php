<?php
namespace JS\JsContactForm\Service;

use JS\JsContactForm\Service\SettingsService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
 * Configuration class
 *
 * @package JS
 * @subpackage js_contact_form
 * (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * 
 */

class Configuration implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * getContentID
	 *
	 * @return \string $id A unique content id
	 */
	
	function getContentID()
	{
		$this->contentObj = $this->configurationManager->getContentObject();

		return $this->contentObj->data['uid'];
	}

	/**
	 * template
	 *
	 * @return
	 */
	 
	function template()
	{
		$settings = SettingsService::getSettings();

		if($settings['configuration']!=1){
			return array("error"=>'include_template');
		}

		$mandatoryArr  = array("name","email");

		if($settings['receiver']['sendMail']==1){
			foreach ($settings['receiver'] as $key => $value) {
				if(in_array($key, $mandatoryArr)){
					if(trim($value)==""){
						return array("error"=>'receiver.missing_configuration');
					}
				}
			}
			if($settings['receiver']['cc']['sendMail']==1){
				foreach ($settings['receiver']['cc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if(trim($value)==""){
							return array("error"=>'receiver.cc.missing_configuration');
						}
					}
				}
			}
			if($settings['receiver']['bcc']['sendMail']==1){
				foreach ($settings['receiver']['bcc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if(trim($value)==""){
							return array("error"=>'receiver.bcc.missing_configuration');
						}
					}
				}
			}
		}

		if($settings['user']['sendMail']==1){
			foreach ($settings['user']['sender'] as $key => $value) {
				if(in_array($key, $mandatoryArr)){
					if(trim($value)==""){
						return array("error"=>'user.missing_configuration');
					}
				}
			}
			if($settings['user']['cc']['sendMail']==1){
				foreach ($settings['user']['cc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if(trim($value)==""){
							return array("error"=>'user.cc.missing_configuration');
						}
					}
				}
			}
			if($settings['user']['bcc']['sendMail']==1){
				foreach ($settings['user']['bcc'] as $key => $value) {
					if(in_array($key, $mandatoryArr)){
						if(trim($value)==""){
							return array("error"=>'user.bcc.missing_configuration');
						}
					}
				}
			}
		}

		if (trim($settings['fields']['form']) == '') {
			return array("error"=>'missing_field_configuration');
		}
		
		if(!isset($settings['logoInMail'])){
			return 0;
		}
		
		return 1;
	}

	/**
	 * additionalData
	 *
	 * @return
	 */
	
	function additionalData()
	{
		$settings = SettingsService::getSettings();

		$key = 'JsContactForm';

		// Inlcude CSS

		$css = $settings['additional']['css'];

		if(!empty($css['basic']['uri'])){
			$basicCSS = '<link rel="stylesheet" href="'.$css['basic']['uri'].'" type="text/css" media="all" />';
		}
		if(!empty($css['fancy']['uri'])){
			$fancyCSS = '<link rel="stylesheet" href="'.$css['fancy']['uri'].'" type="text/css" media="all" />';
		}
		
		$additionalDataCSS = $css['fancy']['include']==1?$fancyCSS:$basicCSS;

		if(!empty($css['responsive']['uri']) && $css['responsive']['include']==1){
			$additionalDataCSS .= '<link rel="stylesheet" href="'.$css['responsive']['uri'].'" type="text/css" media="all" />';
		}
		
		if(!empty($css['ui']['uri']) && $css['ui']['include']==1){
			$additionalDataCSS .= '<link rel="stylesheet" href="'.$css['ui']['uri'].'" type="text/css" media="all" />';
		}

		if($css['includeInFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['JsContactForm.CSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['JsContactForm.CSS'] = $additionalDataCSS;	
		}

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
	}

 	/**
	 * dataExplode
	 *
	 * @param $data
	 * @return
	 */
	
	function dataExplode($data){

		if (trim($data) != '') {
			return GeneralUtility::trimExplode(',', $data, true);
		}

		return '';
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
		if($this->getContentID()>0){
			$key = $this->getContentID();
		}

		$GLOBALS['TSFE']->fe_user->setKey('ses', $key, $data);
		$GLOBALS["TSFE"]->fe_user->sesData_change = true;
		$GLOBALS["TSFE"]->fe_user->storeSessionData();
	}

 	/**
	 * Read a contactForm session
	 *
	 * @param \string $key A session name
	 * @param array $id Unique ID
	 * @return \string\Array Values from session
	 */
	
	function getSessionData($key = '', $id)
	{
		if($this->getContentID()>0){
			$key = $this->getContentID();
		}

		if (isset($GLOBALS['TSFE']->fe_user->sesData[$key])) {

			$sessionData = $GLOBALS['TSFE']->fe_user->sesData[$key];

			if(isset($key)){
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

	/**
	 * browserLanguage
	 *
	 * @return
	 */
	
	function browserLanguage()
	{
		$prefered_languages = array();
		
		if(preg_match_all("#([^;,]+)(;[^,0-9]*([0-9\.]+)[^,]*)?#i", GeneralUtility::getIndpEnv('HTTP_ACCEPT_LANGUAGE'), $matches, PREG_SET_ORDER)) {

			$priority = 1.0;
			
			foreach($matches as $match) {
				if(!isset($match[3])) {
					$pr = $priority;
					$priority -= 0.001;
				} else {
					$pr = floatval($match[3]);
				}
				
				$prefered_languages[$match[1]] = $pr;
			}
		
			arsort($prefered_languages, SORT_NUMERIC);
			
			foreach($prefered_languages as $language => $priority) {
				return $language;
			}
		}
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
	 * is_mobile
	 *
	 * @return
	 */
	function is_mobile() {
	
		$user_agent = GeneralUtility::getIndpEnv('HTTP_USER_AGENT');

		$mobile_agents = Array(
	
			"240x320",
			"acer",
			"acoon",
			"acs-",
			"abacho",
			"ahong",
			"airness",
			"alcatel",
			"amoi",	
			"android",
			"anywhereyougo.com",
			"applewebkit/525",
			"applewebkit/532",
			"asus",
			"audio",
			"au-mic",
			"avantogo",
			"becker",
			"benq",
			"bilbo",
			"bird",
			"blackberry",
			"blazer",
			"bleu",
			"cdm-",
			"compal",
			"coolpad",
			"danger",
			"dbtel",
			"dopod",
			"elaine",
			"eric",
			"etouch",
			"fly " ,
			"fly_",
			"fly-",
			"go.web",
			"goodaccess",
			"gradiente",
			"grundig",
			"haier",
			"hedy",
			"hitachi",
			"htc",
			"huawei",
			"hutchison",
			"inno",
			"ipad",
			"ipaq",
			"ipod",
			"jbrowser",
			"kddi",
			"kgt",
			"kwc",
			"lenovo",
			"lg ",
			"lg2",
			"lg3",
			"lg4",
			"lg5",
			"lg7",
			"lg8",
			"lg9",
			"lg-",
			"lge-",
			"lge9",
			"longcos",
			"maemo",
			"mercator",
			"meridian",
			"micromax",
			"midp",
			"mini",
			"mitsu",
			"mmm",
			"mmp",
			"mobi",
			"mot-",
			"moto",
			"nec-",
			"netfront",
			"newgen",
			"nexian",
			"nf-browser",
			"nintendo",
			"nitro",
			"nokia",
			"nook",
			"novarra",
			"obigo",
			"palm",
			"panasonic",
			"pantech",
			"philips",
			"phone",
			"pg-",
			"playstation",
			"pocket",
			"pt-",
			"qc-",
			"qtek",
			"rover",
			"sagem",
			"sama",
			"samu",
			"sanyo",
			"samsung",
			"sch-",
			"scooter",
			"sec-",
			"sendo",
			"sgh-",
			"sharp",
			"siemens",
			"sie-",
			"softbank",
			"sony",
			"spice",
			"sprint",
			"spv",
			"symbian",
			"tablet",
			"talkabout",
			"tcl-",
			"teleca",
			"telit",
			"tianyu",
			"tim-",
			"toshiba",
			"tsm",
			"up.browser",
			"utec",
			"utstar",
			"verykool",
			"virgin",
			"vk-",
			"voda",
			"voxtel",
			"vx",
			"wap",
			"wellco",
			"wig browser",
			"wii",
			"windows ce",
			"wireless",
			"xda",
			"xde",
			"zte"
		);
	
		$is_mobile = false;
	
		foreach ($mobile_agents as $device) {
	
			if (stristr($user_agent, $device)) {
				$is_mobile = true;
				break;
			}
		}
		return $is_mobile;
	}

	/**
	 * falImages
	 *
	 * @param $result
	 * @param $tablename
	 * @param $fieldname
	 * @return
	 */
	public function falImages($result, $tablename = NULL, $fieldname = NULL) {
		
		$where = '';

		if ($tablename != '') {
			$where = ' AND tablenames = "' . $tablename . '"';
		}
		if ($fieldname != '') {
			$where .= ' AND fieldname IN ("' . $fieldname . '")';
		}

		foreach ($result as $key => $value) {

			$whr = ' deleted= 0 and hidden = 0 ' . $where . ' AND uid_foreign = ' . $value['uid'];
			$sysImages = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'sys_file_reference', $whr);
			$arr = '';

			foreach ($sysImages as $key1 => $value1) {

				$whr1  = 'uid = ' . $value1['uid_local'];

				$sysImageDetail = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'sys_file', $whr1);

				$arr1 = GeneralUtility::trimExplode('/', $sysImageDetail[0]['mime_type'], true);

				$arr[$value1['fieldname']][$value1['uid']] = array(

						'identifier'	=> 'fileadmin' . $sysImageDetail[0]['identifier'],
						'title'			=> $value1['title'],
						'caption'		=> $value1['description'],
						'extension'		=> $sysImageDetail[0]['extension'],
						'mime_type'		=> $sysImageDetail[0]['mime_type'],
						'name'			=> $sysImageDetail[0]['name'],
						'uid'			=> $sysImageDetail[0]['uid'],
						'mime'			=> $arr1[0],
						'type'			=> $arr1[1],
						'imageName'		=> basename($sysImageDetail[0]['identifier']),
					);
			}

			$result[$key]['media'] = $arr;
		}
		return $result;
	}
}