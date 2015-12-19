<?php
namespace JS\JsContactForm\Domain\Model;

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
 * Contact Form
 */
class ContactForm extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * First Name
	 *
	 * @var string
	 */
	protected $firstname = '';

	/**
	 * Last Name
	 *
	 * @var string
	 */
	protected $lastname = '';

	/**
	 * Company Name
	 *
	 * @var string
	 */
	protected $company = '';

	/**
	 * URL
	 *
	 * @var string
	 */
	protected $url = '';

	/**
	 * Email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * Phone
	 *
	 * @var string
	 */
	protected $phone = '';

	/**
	 * Fax
	 *
	 * @var string
	 */
	protected $fax = '';

	/**
	 * Address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * Zip Code
	 *
	 * @var string
	 */
	protected $zip = '';

	/**
	 * City
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * Country
	 *
	 * @var string
	 */
	protected $country = '';

	/**
	 * Message
	 *
	 * @var string
	 */
	protected $message = '';

	/**
	 * Subject Of Mail
	 *
	 * @var string
	 */
	protected $subject = '';

	/**
	 * Page Name where we set contact form
	 *
	 * @var string
	 */
	protected $page = '';

	/**
	 * Contact Date
	 *
	 * @var \DateTime
	 */
	protected $contactDate = NULL;

	/**
	 * IP Address
	 *
	 * @var string
	 */
	protected $ip = '';

	/**
	 * User Agent
	 *
	 * @var string
	 */
	protected $useragent = '';

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Returns the company
	 *
	 * @return string $company
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * Sets the company
	 *
	 * @param string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * Returns the url
	 *
	 * @return string $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the phone
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Sets the phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Returns the fax
	 *
	 * @return string $fax
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * Sets the fax
	 *
	 * @param string $fax
	 * @return void
	 */
	public function setFax($fax) {
		$this->fax = $fax;
	}

	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the country
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Returns the message
	 *
	 * @return string $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Sets the message
	 *
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Returns the subject
	 *
	 * @return string $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Sets the subject
	 *
	 * @param string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * Returns the page
	 *
	 * @return string $page
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * Sets the page
	 *
	 * @param string $page
	 * @return void
	 */
	public function setPage($page) {
		$this->page = $page;
	}

	/**
	 * Returns the contactDate
	 *
	 * @return \DateTime $contactDate
	 */
	public function getContactDate() {
		return $this->contactDate;
	}

	/**
	 * Sets the contactDate
	 *
	 * @param \DateTime $contactDate
	 * @return void
	 */
	public function setContactDate(\DateTime $contactDate) {
		$this->contactDate = $contactDate;
	}

	/**
	 * Returns the ip
	 *
	 * @return string $ip
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * Sets the ip
	 *
	 * @param string $ip
	 * @return void
	 */
	public function setIp($ip) {
		$this->ip = $ip;
	}

	/**
	 * Returns the useragent
	 *
	 * @return string $useragent
	 */
	public function getUseragent() {
		return $this->useragent;
	}

	/**
	 * Sets the useragent
	 *
	 * @param string $useragent
	 * @return void
	 */
	public function setUseragent($useragent) {
		$this->useragent = $useragent;
	}

}