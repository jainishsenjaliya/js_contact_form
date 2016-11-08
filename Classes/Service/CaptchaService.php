<?php
namespace JS\JsContactForm\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;


/**
 * @author  Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * @package TYPO3
 * @subpackage tslib
 */
class CaptchaService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * TypoScript
	 *
	 * @var \array
	 */
	protected $configuration;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * Path to captcha image
	 *
	 * @var \string
	 */
	protected $sesssionName = 'JsContactForm_captcha_value';

	/**
	 * Path to captcha image
	 *
	 * @var \string
	 */
	protected $captchaImagePath = 'typo3temp/captcha/';

	/**
	 * Path to captcha image
	 *
	 * @var \string
	 */
	protected $captchaImage = 'ContactFormCalculatingCaptcha.png';

	/**
	 * Generate Captcha Image
	 *
	 */
	function generateCaptcha($settings) {

		$captchaValue = $this->getStringForCaptcha($settings);

		if (
			!is_dir(dirname($this->getCaptchaImage())) &&
			!GeneralUtility::mkdir(
				GeneralUtility::getFileAbsFileName(dirname($this->getCaptchaImage()))
			)
		) {
			return 'Error: Folder ' . dirname($this->getCaptchaImage()) . '/ don\'t exists';
		}

		$this->setCaptchaSession($captchaValue[0]);

		$captchaImages = $this->createImage($captchaValue[1]);

		return $captchaImages;

	}

	/**
	 * Create Image File
	 *
	 * @param string $content
	 * @param bool $addHash
	 * @return string Image URI
	 */
	protected function createImage($content, $addHash = TRUE) {

		$startimage = GeneralUtility::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '' . $this->getSubFolderOfCurrentUrl();
		$startimage .= $this->getFileName($this->configuration['captcha.']['default.']['image']); 

		if (!is_file($startimage)) {
			return 'Error: No Image found on ' . $startimage;
		}

		$img = ImageCreateFromPNG($startimage);
		$config = array();
		$config['color_rgb'] = sscanf($this->configuration['captcha.']['default.']['textColor'], '#%2x%2x%2x');
		$config['color'] = ImageColorAllocate($img, $config['color_rgb'][0], $config['color_rgb'][1], $config['color_rgb'][2]);
		$config['font'] = GeneralUtility::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/' . $this->getSubFolderOfCurrentUrl();
		$config['font'] .= $this->getFileName($this->configuration['captcha.']['default.']['font']);
		$config['fontsize'] = $this->configuration['captcha.']['default.']['textSize'];
		$config['angle'] = GeneralUtility::trimExplode(',', $this->configuration['captcha.']['default.']['textAngle'], TRUE);
		$config['fontangle'] = mt_rand($config['angle'][0], $config['angle'][1]);
		$config['distance_hor'] = GeneralUtility::trimExplode(',', $this->configuration['captcha.']['default.']['distanceHor'], TRUE);
		$config['fontdistance_hor'] = mt_rand($config['distance_hor'][0], $config['distance_hor'][1]);
		$config['distance_vert'] = GeneralUtility::trimExplode(',', $this->configuration['captcha.']['default.']['distanceVer'], TRUE);
		$config['fontdistance_vert'] = mt_rand($config['distance_vert'][0], $config['distance_vert'][1]);

		imagettftext(
			$img,
			$config['fontsize'],
			$config['fontangle'],
			$config['fontdistance_hor'],
			$config['fontdistance_vert'],
			$config['color'],
			$config['font'],
			$content
		);
		imagepng(
			$img,
			GeneralUtility::getIndpEnv('TYPO3_DOCUMENT_ROOT') . '/' .
			$this->getSubFolderOfCurrentUrl() . $this->getCaptchaImage()
		);
		imagedestroy($img);

		$imageUri = $this->getCaptchaImage();
		if ($addHash) {
			$imageUri .= '?hash=' . time();
		}
		return $imageUri;
	}


	/**
	 * @param string $result
	 * @return void
	 */
	protected function setCaptchaSession($result) {
		
		$GLOBALS['TSFE']->fe_user->setKey('ses', $this->getSesssionName(), $result);
		$GLOBALS["TSFE"]->fe_user->sesData_change = true;
		$GLOBALS["TSFE"]->fe_user->storeSessionData();	  
	}   


	/**
	 * Create Random String for Captcha Image
	 *
	 * @param settings
	 * @param int $maxNumber
	 * @param int $maxOperatorNumber choose which operators are allowd
	 * @return array
	 *	  0 => 3
	 *	  1 => '1+2'
	 */
	function getStringForCaptcha($settings, $maxNumber = 15, $maxOperatorNumber = 1) {

		$operators = array('+','-','x',':');

		$result = $number1 = $number2 = 0;
		$operator = $operators[mt_rand(0, $maxOperatorNumber)];
		for ($i = 0; $i < 100; $i++) {
			$number1 = mt_rand(0, $maxNumber);
			$number2 = mt_rand(0, $maxNumber);
			$result = $this->mathematicOperation($number1, $number2, $operator);
			if ($result > 0) {
				break;
			}
		}

		// Force values for testing
		if (!empty($settings['captcha']['default.']['forceValue'])) {
			preg_match_all('~(\d+)\s*([+|\-|:|x])\s*(\d+)~', $settings['captcha']['default.']['forceValue'], $matches);
			$number1 = $matches[1][0];
			$number2 = $matches[3][0];
			$operator = $matches[2][0];
			$result = $this->mathematicOperation($number1, $number2, $operator);
		}

		return array($result, $number1 . ' ' . $operator . ' ' . $number2);
	}

	/**
	 * Check if given code is correct
	 *
	 * @param string $code String to compare
	 * @param bool $clearSession
	 * @return boolean
	 */
	public function validCode($code, $clearSession = TRUE) {
		if ((int) $code === $this->getCaptchaSession() && !empty($code)) {
			if ($clearSession) {
				$this->setCaptchaSession('');
			}
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * @return int
	 */
	protected function getCaptchaSession() {
		return (int) $GLOBALS['TSFE']->fe_user->sesData[$this->getSesssionName()];
	}

	/**
	 * @param array $configuration
	 * @return void
	 */
	public function setConfiguration($configuration) {
		$this->configuration = $configuration;
	}

	/**
	 * @return array
	 */
	public function getConfiguration() {
		return $this->configuration;
	}	

	/**
	 * @param string $string
	 * @return string
	 */
	protected function getFilename($string) {
		$string = str_replace('EXT:', 'typo3conf/ext/', $string);
		/** @var \TYPO3\CMS\Core\TypoScript\TemplateService $templateService */
		$templateService = GeneralUtility::makeInstance('TYPO3\CMS\Core\TypoScript\TemplateService');
		return $templateService->getFileName($string);
	}

	/**
	 * Mathematic operation
	 *
	 * @param int $number1
	 * @param int $number2
	 * @param string $operator +|-|x|:
	 * @return int
	 */
	protected function mathematicOperation($number1, $number2, $operator = '+') {
		switch ($operator) {
			case '-':
				$result = $number1 - $number2;
				break;
			case 'x':
				$result = $number1 * $number2;
				break;
			case ':':
				$result = $number1 / $number2;
				break;
			case '+':
			default:
				$result = $number1 + $number2;
		}
		return $result;
	} 

	/**
	 * @return string
	 */
	public function getCaptchaImage() {
		$this->contentObj = $this->configurationManager->getContentObject();
		$imgae = $this->captchaImagePath.md5($this->contentObj->data['uid']).$this->captchaImage;
		return $imgae;
	}

	/**
	 * @return string
	 */
	public function getSesssionName() {

		$this->contentObj = $this->configurationManager->getContentObject();

		return $this->contentObj->data['uid']."-".$this->sesssionName;
	}	


	/**
	 * Get Subfolder of current TYPO3 Installation
	 *		and never return "//"
	 *
	 * @param bool $leadingSlash will be prepended
	 * @param bool $trailingSlash will be appended
	 * @param string $testHost can be used for a test
	 * @param string $testUrl can be used for a test
	 * @return string
	 */
	public static function getSubFolderOfCurrentUrl($leadingSlash = TRUE, $trailingSlash = TRUE, $testHost = NULL, $testUrl = NULL) {

		$subfolder = '';

		$typo3RequestHost = GeneralUtility::getIndpEnv('TYPO3_REQUEST_HOST');

		if ($testHost) {
			$typo3RequestHost = $testHost;
		}

		$typo3SiteUrl = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		if ($testUrl) {
			$typo3SiteUrl = $testUrl;
		}

		// if subfolder
		if ($typo3RequestHost . '/' !== $typo3SiteUrl) {
			$subfolder = substr(str_replace($typo3RequestHost . '/', '', $typo3SiteUrl), 0, -1);
		}
		if ($trailingSlash && substr($subfolder, 0, -1) !== '/') {
			$subfolder .= '/';
		}
		if ($leadingSlash && $subfolder[0] !== '/') {
			$subfolder = '/' . $subfolder;
		}
		return $subfolder;
	}
}
?>