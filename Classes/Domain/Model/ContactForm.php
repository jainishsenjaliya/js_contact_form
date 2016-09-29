<?php
namespace JS\JsContactForm\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
class ContactForm extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * Gender
     *
     * @var string
     */
    protected $gender = 0;
    
    /**
     * First Name
     *
     * @var string
     */
    protected $firstName = '';
    
    /**
     * Middle Name
     *
     * @var string
     */
    protected $middleName = '';
    
    /**
     * Last Name
     *
     * @var string
     */
    protected $lastName = '';
    
    /**
     * Title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * Birthday
     *
     * @var \DateTime
     */
    protected $birthday = null;
    
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
     * Mobile
     *
     * @var string
     */
    protected $mobile = '';
    
    /**
     * URL
     *
     * @var string
     */
    protected $www = '';
    
    /**
     * Address
     *
     * @var string
     */
    protected $address = '';
    
    /**
     * Building
     *
     * @var string
     */
    protected $building = '';
    
    /**
     * Room
     *
     * @var string
     */
    protected $room = '';
    
    /**
     * City
     *
     * @var string
     */
    protected $city = '';
    
    /**
     * Zip Code
     *
     * @var string
     */
    protected $zip = '';
    
    /**
     * Region/State:
     *
     * @var string
     */
    protected $region = '';
    
    /**
     * Country
     *
     * @var string
     */
    protected $country = '';
    
    /**
     * Organization
     *
     * @var string
     */
    protected $company = '';
    
    /**
     * Position
     *
     * @var string
     */
    protected $position = '';
    
    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * Message
     *
     * @var string
     */
    protected $message = '';
    
    /**
     * Description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * Skype
     *
     * @var string
     */
    protected $skype = '';
    
    /**
     * Twitter
     *
     * @var string
     */
    protected $twitter = '';
    
    /**
     * Facebook
     *
     * @var string
     */
    protected $facebook = '';
    
    /**
     * Linkedin
     *
     * @var string
     */
    protected $linkedin = '';
    
    /**
     * Contact Date
     *
     * @var \DateTime
     */
    protected $creationDate = NULL;
    
    /**
     * Receiver Email Configuration
     *
     * @var bool
     */
    protected $receiverEmailConfiguration = false;
    
    /**
     * Receiver Email Sent
     *
     * @var bool
     */
    protected $receiverEmailSent = false;
    
    /**
     * Receiver Name
     *
     * @var string
     */
    protected $receiverName = '';
    
    /**
     * Receiver Email
     *
     * @var string
     */
    protected $receiverEmail = '';
    
    /**
     * Receiver Sender Name
     *
     * @var string
     */
    protected $receiverSenderName = '';
    
    /**
     * Receiver Senders Email
     *
     * @var string
     */
    protected $receiverSenderEmail = '';
    
    /**
     * receiverNoreplyName
     *
     * @var string
     */
    protected $receiverNoreplyName = '';
    
    /**
     * Receiver Noreply Email
     *
     * @var string
     */
    protected $receiverNoreplyEmail = '';
    
    /**
     * Receiver CC Configuration
     *
     * @var bool
     */
    protected $receiverCcSend = '';
    
    /**
     * Receiver CC Name
     *
     * @var string
     */
    protected $receiverCcName = '';
    
    /**
     * Receiver CC Email
     *
     * @var string
     */
    protected $receiverCcEmail = '';
    
    /**
     * Receiver BCC Configuration
     *
     * @var bool
     */
    protected $receiverBccSend = '';
    
    /**
     * Receiver BCC Name
     *
     * @var string
     */
    protected $receiverBccName = '';
    
    /**
     * Receiver BCC Email
     *
     * @var string
     */
    protected $receiverBccEmail = '';
    
    /**
     * Receiver Email Subject
     *
     * @var string
     */
    protected $receiverEmailSubject = '';
    
    /**
     * Receiver Email Body
     *
     * @var string
     */
    protected $receiverEmailBody = '';
    
    /**
     * User Email Configuration
     *
     * @var bool
     */
    protected $userEmailConfiguration = false;
    
    /**
     * User Email Sent
     *
     * @var bool
     */
    protected $userEmailSent = false;
    
    /**
     * User Sender Name
     *
     * @var string
     */
    protected $userSenderName = '';
    
    /**
     * User Sender Email
     *
     * @var string
     */
    protected $userSenderEmail = '';
    
    /**
     * User Noreply Name
     *
     * @var string
     */
    protected $userNoreplyName = '';
    
    /**
     * User Noreply Email
     *
     * @var string
     */
    protected $userNoreplyEmail = '';
    
    /**
     * User CC Configuration
     *
     * @var bool
     */
    protected $userCcSend = '';
    
    /**
     * User CC Name
     *
     * @var string
     */
    protected $userCcName = '';
    
    /**
     * User CC Email
     *
     * @var string
     */
    protected $userCcEmail = '';
    
    /**
     * User BCC Configuration
     *
     * @var bool
     */
    protected $userBccSend = '';
    
    /**
     * User BCC Name
     *
     * @var string
     */
    protected $userBccName = '';
    
    /**
     * User BCC Email
     *
     * @var string
     */
    protected $userBccEmail = '';
    
    /**
     * User Email Subject
     *
     * @var string
     */
    protected $userEmailSubject = '';
    
    /**
     * User Email Body
     *
     * @var string
     */
    protected $userEmailBody = '';
    
    /**
     * FE User
     *
     * @var string
     */
    protected $feuser = '';
    
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
     * Visitors Country
     *
     * @var string
     */
    protected $visitorsCountry = '';
    
    /**
     * Referer Domain
     *
     * @var string
     */
    protected $refererDomain = '';
    
    /**
     * Referer Uri
     *
     * @var string
     */
    protected $refererUri = '';
    
    /**
     * Current Page
     *
     * @var string
     */
    protected $page = '';
    
    /**
     * Mobile Device
     *
     * @var bool
     */
    protected $mobileDevice = FALSE;
    
    /**
     * Website Language
     *
     * @var string
     */
    protected $websiteLanguage = '';
    
    /**
     * Website Language ID
     *
     * @var string
     */
    protected $websiteLanguageId = '';
    
    /**
     * Browser Language
     *
     * @var string
     */
    protected $browserLanguage = '';
    
    /**
     * Returns the company
     *
     * @return string $company
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    /**
     * Sets the company
     *
     * @param string $company
     * @return void
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
    
    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * Returns the fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }
    
    /**
     * Sets the fax
     *
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }
    
    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }
    
    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }
    
    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    /**
     * Returns the country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Sets the country
     *
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * Returns the message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * Sets the message
     *
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    /**
     * Returns the creationDate
     *
     * @return \DateTime creationDate
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    
    /**
     * Sets the creationDate
     *
     * @param \DateTime $creationDate
     * @return \DateTime creationDate
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }
    
    /**
     * Returns the userEmailBody
     *
     * @return string $userEmailBody
     */
    public function getUserEmailBody()
    {
        return $this->userEmailBody;
    }
    
    /**
     * Sets the userEmailBody
     *
     * @param string $userEmailBody
     * @return void
     */
    public function setUserEmailBody($userEmailBody)
    {
        $this->userEmailBody = $userEmailBody;
    }
    
    /**
     * Returns the ip
     *
     * @return string $ip
     */
    public function getIp()
    {
        return $this->ip;
    }
    
    /**
     * Sets the ip
     *
     * @param string $ip
     * @return void
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
    
    /**
     * Returns the useragent
     *
     * @return string $useragent
     */
    public function getUseragent()
    {
        return $this->useragent;
    }
    
    /**
     * Sets the useragent
     *
     * @param string $useragent
     * @return void
     */
    public function setUseragent($useragent)
    {
        $this->useragent = $useragent;
    }
    
    /**
     * Returns the visitorsCountry
     *
     * @return string $visitorsCountry
     */
    public function getVisitorsCountry()
    {
        return $this->visitorsCountry;
    }
    
    /**
     * Sets the visitorsCountry
     *
     * @param string $visitorsCountry
     * @return void
     */
    public function setVisitorsCountry($visitorsCountry)
    {
        $this->visitorsCountry = $visitorsCountry;
    }
    
    /**
     * Returns the refererDomain
     *
     * @return string $refererDomain
     */
    public function getRefererDomain()
    {
        return $this->refererDomain;
    }
    
    /**
     * Sets the refererDomain
     *
     * @param string $refererDomain
     * @return void
     */
    public function setRefererDomain($refererDomain)
    {
        $this->refererDomain = $refererDomain;
    }
    
    /**
     * Returns the refererUri
     *
     * @return string $refererUri
     */
    public function getRefererUri()
    {
        return $this->refererUri;
    }
    
    /**
     * Sets the refererUri
     *
     * @param string $refererUri
     * @return void
     */
    public function setRefererUri($refererUri)
    {
        $this->refererUri = $refererUri;
    }
    
    /**
     * Returns the page
     *
     * @return string $page
     */
    public function getPage()
    {
        return $this->page;
    }
    
    /**
     * Sets the page
     *
     * @param string $page
     * @return void
     */
    public function setPage($page)
    {
        $this->page = $page;
    }
    
    /**
     * Returns the mobileDevice
     *
     * @return boolean $mobileDevice
     */
    public function getMobileDevice()
    {
        return $this->mobileDevice;
    }
    
    /**
     * Sets the mobileDevice
     *
     * @param boolean $mobileDevice
     * @return void
     */
    public function setMobileDevice($mobileDevice)
    {
        $this->mobileDevice = $mobileDevice;
    }
    
    /**
     * Returns the boolean state of mobileDevice
     *
     * @return boolean
     */
    public function isMobileDevice()
    {
        return $this->mobileDevice;
    }
    
    /**
     * Returns the websiteLanguage
     *
     * @return string $websiteLanguage
     */
    public function getWebsiteLanguage()
    {
        return $this->websiteLanguage;
    }
    
    /**
     * Sets the websiteLanguage
     *
     * @param string $websiteLanguage
     * @return void
     */
    public function setWebsiteLanguage($websiteLanguage)
    {
        $this->websiteLanguage = $websiteLanguage;
    }
    
    /**
     * Returns the browserLanguage
     *
     * @return string $browserLanguage
     */
    public function getBrowserLanguage()
    {
        return $this->browserLanguage;
    }
    
    /**
     * Sets the browserLanguage
     *
     * @param string $browserLanguage
     * @return void
     */
    public function setBrowserLanguage($browserLanguage)
    {
        $this->browserLanguage = $browserLanguage;
    }
    
    /**
     * Returns the userEmailSubject
     *
     * @return string userEmailSubject
     */
    public function getUserEmailSubject()
    {
        return $this->userEmailSubject;
    }
    
    /**
     * Sets the userEmailSubject
     *
     * @param string $userEmailSubject
     * @return void
     */
    public function setUserEmailSubject($userEmailSubject)
    {
        $this->userEmailSubject = $userEmailSubject;
    }
    
    /**
     * Returns the boolean state of receiversEmailConfiguration
     *
     * @return bool
     */
    public function isReceiversEmailConfiguration()
    {
        return $this->receiversEmailConfiguration;
    }
    
    /**
     * Returns the boolean state of receiversEmailSent
     *
     * @return bool
     */
    public function isReceiversEmailSent()
    {
        return $this->receiversEmailSent;
    }
    
    /**
     * Returns the userEmailConfiguration
     *
     * @return bool $userEmailConfiguration
     */
    public function getUserEmailConfiguration()
    {
        return $this->userEmailConfiguration;
    }
    
    /**
     * Sets the userEmailConfiguration
     *
     * @param bool $userEmailConfiguration
     * @return void
     */
    public function setUserEmailConfiguration($userEmailConfiguration)
    {
        $this->userEmailConfiguration = $userEmailConfiguration;
    }
    
    /**
     * Returns the boolean state of userEmailConfiguration
     *
     * @return bool
     */
    public function isUserEmailConfiguration()
    {
        return $this->userEmailConfiguration;
    }
    
    /**
     * Returns the userEmailSent
     *
     * @return bool $userEmailSent
     */
    public function getUserEmailSent()
    {
        return $this->userEmailSent;
    }
    
    /**
     * Sets the userEmailSent
     *
     * @param bool $userEmailSent
     * @return void
     */
    public function setUserEmailSent($userEmailSent)
    {
        $this->userEmailSent = $userEmailSent;
    }
    
    /**
     * Returns the boolean state of userEmailSent
     *
     * @return bool
     */
    public function isUserEmailSent()
    {
        return $this->userEmailSent;
    }
    
    /**
     * Returns the feuser
     *
     * @return string $feuser
     */
    public function getFeuser()
    {
        return $this->feuser;
    }
    
    /**
     * Sets the feuser
     *
     * @param string $feuser
     * @return void
     */
    public function setFeuser($feuser)
    {
        $this->feuser = $feuser;
    }
    
    /**
     * Returns the websiteLanguageId
     *
     * @return string $websiteLanguageId
     */
    public function getWebsiteLanguageId()
    {
        return $this->websiteLanguageId;
    }
    
    /**
     * Sets the websiteLanguageId
     *
     * @param string $websiteLanguageId
     * @return void
     */
    public function setWebsiteLanguageId($websiteLanguageId)
    {
        $this->websiteLanguageId = $websiteLanguageId;
    }
    
    /**
     * Returns the firstName
     *
     * @return string firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * Returns the lastName
     *
     * @return string lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    /**
     * Returns the www
     *
     * @return string www
     */
    public function getWww()
    {
        return $this->www;
    }
    
    /**
     * Sets the www
     *
     * @param string $www
     * @return void
     */
    public function setWww($www)
    {
        $this->www = $www;
    }
    
    /**
     * Returns the receiverName
     *
     * @return string receiverName
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }
    
    /**
     * Sets the receiverName
     *
     * @param string $receiverName
     * @return void
     */
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;
    }
    
    /**
     * Returns the receiverEmail
     *
     * @return string receiverEmail
     */
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }
    
    /**
     * Sets the receiverEmail
     *
     * @param string $receiverEmail
     * @return void
     */
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;
    }
    
    /**
     * Returns the receiverSenderName
     *
     * @return string receiverSenderName
     */
    public function getReceiverSenderName()
    {
        return $this->receiverSenderName;
    }
    
    /**
     * Sets the receiverSenderName
     *
     * @param string $receiverSenderName
     * @return void
     */
    public function setReceiverSenderName($receiverSenderName)
    {
        $this->receiverSenderName = $receiverSenderName;
    }
    
    /**
     * Returns the receiverEmailConfiguration
     *
     * @return bool receiverEmailConfiguration
     */
    public function getReceiverEmailConfiguration()
    {
        return $this->receiverEmailConfiguration;
    }
    
    /**
     * Sets the receiverEmailConfiguration
     *
     * @param bool $receiverEmailConfiguration
     * @return void
     */
    public function setReceiverEmailConfiguration($receiverEmailConfiguration)
    {
        $this->receiverEmailConfiguration = $receiverEmailConfiguration;
    }
    
    /**
     * Returns the receiverEmailSent
     *
     * @return bool receiverEmailSent
     */
    public function getReceiverEmailSent()
    {
        return $this->receiverEmailSent;
    }
    
    /**
     * Sets the receiverEmailSent
     *
     * @param bool $receiverEmailSent
     * @return void
     */
    public function setReceiverEmailSent($receiverEmailSent)
    {
        $this->receiverEmailSent = $receiverEmailSent;
    }
    
    /**
     * Returns the receiverEmailSubject
     *
     * @return string receiverEmailSubject
     */
    public function getReceiverEmailSubject()
    {
        return $this->receiverEmailSubject;
    }
    
    /**
     * Sets the receiverEmailSubject
     *
     * @param string $receiverEmailSubject
     * @return void
     */
    public function setReceiverEmailSubject($receiverEmailSubject)
    {
        $this->receiverEmailSubject = $receiverEmailSubject;
    }
    
    /**
     * Returns the receiverEmailBody
     *
     * @return string receiverEmailBody
     */
    public function getReceiverEmailBody()
    {
        return $this->receiverEmailBody;
    }
    
    /**
     * Sets the receiverEmailBody
     *
     * @param string $receiverEmailBody
     * @return void
     */
    public function setReceiverEmailBody($receiverEmailBody)
    {
        $this->receiverEmailBody = $receiverEmailBody;
    }
    
    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Returns the middleName
     *
     * @return string $middleName
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }
    
    /**
     * Sets the middleName
     *
     * @param string $middleName
     * @return void
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }
    
    /**
     * Returns the birthday
     *
     * @return \DateTime $birthday
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    
    /**
     * Sets the birthday
     *
     * @param \DateTime $birthday
     * @return void
     */
    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the mobile
     *
     * @return string $mobile
     */
    public function getMobile()
    {
        return $this->mobile;
    }
    
    /**
     * Sets the mobile
     *
     * @param string $mobile
     * @return void
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
    
    /**
     * Returns the building
     *
     * @return string $building
     */
    public function getBuilding()
    {
        return $this->building;
    }
    
    /**
     * Sets the building
     *
     * @param string $building
     * @return void
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }
    
    /**
     * Returns the room
     *
     * @return string $room
     */
    public function getRoom()
    {
        return $this->room;
    }
    
    /**
     * Sets the room
     *
     * @param string $room
     * @return void
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }
    
    /**
     * Returns the region
     *
     * @return string $region
     */
    public function getRegion()
    {
        return $this->region;
    }
    
    /**
     * Sets the region
     *
     * @param string $region
     * @return void
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the receiverNoreplyName
     *
     * @return string $receiverNoreplyName
     */
    public function getReceiverNoreplyName()
    {
        return $this->receiverNoreplyName;
    }
    
    /**
     * Sets the receiverNoreplyName
     *
     * @param string $receiverNoreplyName
     * @return void
     */
    public function setReceiverNoreplyName($receiverNoreplyName)
    {
        $this->receiverNoreplyName = $receiverNoreplyName;
    }
    
    /**
     * Returns the receiverNoreplyEmail
     *
     * @return string $receiverNoreplyEmail
     */
    public function getReceiverNoreplyEmail()
    {
        return $this->receiverNoreplyEmail;
    }
    
    /**
     * Sets the receiverNoreplyEmail
     *
     * @param string $receiverNoreplyEmail
     * @return void
     */
    public function setReceiverNoreplyEmail($receiverNoreplyEmail)
    {
        $this->receiverNoreplyEmail = $receiverNoreplyEmail;
    }
    
    /**
     * Returns the receiverCcName
     *
     * @return string $receiverCcName
     */
    public function getReceiverCcName()
    {
        return $this->receiverCcName;
    }
    
    /**
     * Sets the receiverCcName
     *
     * @param string $receiverCcName
     * @return void
     */
    public function setReceiverCcName($receiverCcName)
    {
        $this->receiverCcName = $receiverCcName;
    }
    
    /**
     * Returns the receiverCcEmail
     *
     * @return string $receiverCcEmail
     */
    public function getReceiverCcEmail()
    {
        return $this->receiverCcEmail;
    }
    
    /**
     * Sets the receiverCcEmail
     *
     * @param string $receiverCcEmail
     * @return void
     */
    public function setReceiverCcEmail($receiverCcEmail)
    {
        $this->receiverCcEmail = $receiverCcEmail;
    }
    
    /**
     * Returns the receiverBccName
     *
     * @return string $receiverBccName
     */
    public function getReceiverBccName()
    {
        return $this->receiverBccName;
    }
    
    /**
     * Sets the receiverBccName
     *
     * @param string $receiverBccName
     * @return void
     */
    public function setReceiverBccName($receiverBccName)
    {
        $this->receiverBccName = $receiverBccName;
    }
    
    /**
     * Returns the receiverBccEmail
     *
     * @return string $receiverBccEmail
     */
    public function getReceiverBccEmail()
    {
        return $this->receiverBccEmail;
    }
    
    /**
     * Sets the receiverBccEmail
     *
     * @param string $receiverBccEmail
     * @return void
     */
    public function setReceiverBccEmail($receiverBccEmail)
    {
        $this->receiverBccEmail = $receiverBccEmail;
    }
    
    /**
     * Returns the userSenderName
     *
     * @return string $userSenderName
     */
    public function getUserSenderName()
    {
        return $this->userSenderName;
    }
    
    /**
     * Sets the userSenderName
     *
     * @param string $userSenderName
     * @return void
     */
    public function setUserSenderName($userSenderName)
    {
        $this->userSenderName = $userSenderName;
    }
    
    /**
     * Returns the userSenderEmail
     *
     * @return string $userSenderEmail
     */
    public function getUserSenderEmail()
    {
        return $this->userSenderEmail;
    }
    
    /**
     * Sets the userSenderEmail
     *
     * @param string $userSenderEmail
     * @return void
     */
    public function setUserSenderEmail($userSenderEmail)
    {
        $this->userSenderEmail = $userSenderEmail;
    }
    
    /**
     * Returns the userNoreplyName
     *
     * @return string $userNoreplyName
     */
    public function getUserNoreplyName()
    {
        return $this->userNoreplyName;
    }
    
    /**
     * Sets the userNoreplyName
     *
     * @param string $userNoreplyName
     * @return void
     */
    public function setUserNoreplyName($userNoreplyName)
    {
        $this->userNoreplyName = $userNoreplyName;
    }
    
    /**
     * Returns the userNoreplyEmail
     *
     * @return string $userNoreplyEmail
     */
    public function getUserNoreplyEmail()
    {
        return $this->userNoreplyEmail;
    }
    
    /**
     * Sets the userNoreplyEmail
     *
     * @param string $userNoreplyEmail
     * @return void
     */
    public function setUserNoreplyEmail($userNoreplyEmail)
    {
        $this->userNoreplyEmail = $userNoreplyEmail;
    }
    
    /**
     * Returns the userCcName
     *
     * @return string $userCcName
     */
    public function getUserCcName()
    {
        return $this->userCcName;
    }
    
    /**
     * Sets the userCcName
     *
     * @param string $userCcName
     * @return void
     */
    public function setUserCcName($userCcName)
    {
        $this->userCcName = $userCcName;
    }
    
    /**
     * Returns the userCcEmail
     *
     * @return string $userCcEmail
     */
    public function getUserCcEmail()
    {
        return $this->userCcEmail;
    }
    
    /**
     * Sets the userCcEmail
     *
     * @param string $userCcEmail
     * @return void
     */
    public function setUserCcEmail($userCcEmail)
    {
        $this->userCcEmail = $userCcEmail;
    }
    
    /**
     * Returns the userBccName
     *
     * @return string $userBccName
     */
    public function getUserBccName()
    {
        return $this->userBccName;
    }
    
    /**
     * Sets the userBccName
     *
     * @param string $userBccName
     * @return void
     */
    public function setUserBccName($userBccName)
    {
        $this->userBccName = $userBccName;
    }
    
    /**
     * Returns the userBccEmail
     *
     * @return string $userBccEmail
     */
    public function getUserBccEmail()
    {
        return $this->userBccEmail;
    }
    
    /**
     * Sets the userBccEmail
     *
     * @param string $userBccEmail
     * @return void
     */
    public function setUserBccEmail($userBccEmail)
    {
        $this->userBccEmail = $userBccEmail;
    }
    
    /**
     * Returns the receiverSenderEmail
     *
     * @return string receiverSenderEmail
     */
    public function getReceiverSenderEmail()
    {
        return $this->receiverSenderEmail;
    }
    
    /**
     * Sets the receiverSenderEmail
     *
     * @param string $receiverSenderEmail
     * @return void
     */
    public function setReceiverSenderEmail($receiverSenderEmail)
    {
        $this->receiverSenderEmail = $receiverSenderEmail;
    }
    
    /**
     * Returns the gender
     *
     * @return string gender
     */
    public function getGender()
    {
        return $this->gender;
    }
    
    /**
     * Sets the gender
     *
     * @param int $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    
    /**
     * Returns the position
     *
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    /**
     * Sets the position
     *
     * @param string $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
    
    /**
     * Returns the skype
     *
     * @return string $skype
     */
    public function getSkype()
    {
        return $this->skype;
    }
    
    /**
     * Sets the skype
     *
     * @param string $skype
     * @return void
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;
    }
    
    /**
     * Returns the twitter
     *
     * @return string $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }
    
    /**
     * Sets the twitter
     *
     * @param string $twitter
     * @return void
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }
    
    /**
     * Returns the facebook
     *
     * @return string $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }
    
    /**
     * Sets the facebook
     *
     * @param string $facebook
     * @return void
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }
    
    /**
     * Returns the linkedin
     *
     * @return string $linkedin
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }
    
    /**
     * Sets the linkedin
     *
     * @param string $linkedin
     * @return void
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }
    
    /**
     * Returns the receiverCcSend
     *
     * @return bool receiverCcSend
     */
    public function getReceiverCcSend()
    {
        return $this->receiverCcSend;
    }
    
    /**
     * Sets the receiverCcSend
     *
     * @param string $receiverCcSend
     * @return void
     */
    public function setReceiverCcSend($receiverCcSend)
    {
        $this->receiverCcSend = $receiverCcSend;
    }
    
    /**
     * Returns the receiverBccSend
     *
     * @return bool receiverBccSend
     */
    public function getReceiverBccSend()
    {
        return $this->receiverBccSend;
    }
    
    /**
     * Sets the receiverBccSend
     *
     * @param string $receiverBccSend
     * @return void
     */
    public function setReceiverBccSend($receiverBccSend)
    {
        $this->receiverBccSend = $receiverBccSend;
    }
    
    /**
     * Returns the userCcSend
     *
     * @return bool userCcSend
     */
    public function getUserCcSend()
    {
        return $this->userCcSend;
    }
    
    /**
     * Sets the userCcSend
     *
     * @param string $userCcSend
     * @return void
     */
    public function setUserCcSend($userCcSend)
    {
        $this->userCcSend = $userCcSend;
    }
    
    /**
     * Returns the userBccSend
     *
     * @return bool userBccSend
     */
    public function getUserBccSend()
    {
        return $this->userBccSend;
    }
    
    /**
     * Sets the userBccSend
     *
     * @param string $userBccSend
     * @return void
     */
    public function setUserBccSend($userBccSend)
    {
        $this->userBccSend = $userBccSend;
    }

}