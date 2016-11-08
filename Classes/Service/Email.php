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
 * Email Service class
 *
 * @package JS
 * @subpackage js_contact_form
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 */
class Email {

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
}
