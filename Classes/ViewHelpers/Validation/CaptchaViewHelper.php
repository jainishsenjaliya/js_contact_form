<?php
namespace JS\JsContactForm\ViewHelpers\Validation;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Get Captcha
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class CaptchaViewHelper extends AbstractViewHelper {

	/**
	 * PersistenceManager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;

	/**
	 * @var \JS\JsContactForm\Service\CaptchaService
	 * @inject
	 */
	protected $CaptchaService;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * Configuration
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * Returns Captcha-Image String
	 *
	 * @return string image URL
	 */
	public function render() {
	
		$this->CaptchaService->setConfiguration($this->settings);

		$image = $this->CaptchaService->generateCaptcha($this->settings);

		return $image;
	}

	/**
	 * Init
	 *
	 * @return void
	 */
	public function initialize() {
		$typoScriptSetup = $this->configurationManager->getConfiguration(
			ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
		);
		
		$this->settings = $typoScriptSetup['plugin.']['tx_jscontactform.']['settings.'];
	}
}