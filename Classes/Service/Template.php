<?php

namespace JS\JsContactForm\Service;

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
 * Template class
 *
 * @package JS
 * @subpackage js_contact_form
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 */
class Template {

 	/**
	 * getView
	 *
     * @param string $templateName [ i.e Email/Template.html]
     * @param string $format
     * @return \TYPO3\CMS\Fluid\View\StandaloneView
     */
	
	function getView($templateName, $format = 'html')
	{

		$view = GeneralUtility::makeInstance('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$view->setFormat($format);
		//$view->getRequest()->setControllerExtensionName('js_contact_form');

		$objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		
		$configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface'); 

		$configuration = $configurationManager->getConfiguration(
							ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
						);

		$templateRootPath	= GeneralUtility::getFileAbsFileName($configuration['view']['templateRootPaths'][0]);

		$templatePathAndFilename = $templateRootPath . $templateName;
		
		$view->setTemplatePathAndFilename($templatePathAndFilename);

		return $view;
	}
}
