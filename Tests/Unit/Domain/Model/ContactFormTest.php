<?php

namespace JS\JsContactForm\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \JS\JsContactForm\Domain\Model\ContactForm.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 */
class ContactFormTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \JS\JsContactForm\Domain\Model\ContactForm
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \JS\JsContactForm\Domain\Model\ContactForm();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGenderReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getGender()
		);
	}

	/**
	 * @test
	 */
	public function setGenderForStringSetsGender()
	{
		$this->subject->setGender('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'gender',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFirstNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFirstName()
		);
	}

	/**
	 * @test
	 */
	public function setFirstNameForStringSetsFirstName()
	{
		$this->subject->setFirstName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'firstName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMiddleNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMiddleName()
		);
	}

	/**
	 * @test
	 */
	public function setMiddleNameForStringSetsMiddleName()
	{
		$this->subject->setMiddleName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'middleName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLastName()
		);
	}

	/**
	 * @test
	 */
	public function setLastNameForStringSetsLastName()
	{
		$this->subject->setLastName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBirthdayReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getBirthday()
		);
	}

	/**
	 * @test
	 */
	public function setBirthdayForDateTimeSetsBirthday()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setBirthday($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'birthday',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhoneReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone()
	{
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFaxReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFax()
		);
	}

	/**
	 * @test
	 */
	public function setFaxForStringSetsFax()
	{
		$this->subject->setFax('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fax',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMobileReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMobile()
		);
	}

	/**
	 * @test
	 */
	public function setMobileForStringSetsMobile()
	{
		$this->subject->setMobile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mobile',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWwwReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWww()
		);
	}

	/**
	 * @test
	 */
	public function setWwwForStringSetsWww()
	{
		$this->subject->setWww('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'www',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress()
	{
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBuildingReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBuilding()
		);
	}

	/**
	 * @test
	 */
	public function setBuildingForStringSetsBuilding()
	{
		$this->subject->setBuilding('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'building',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRoomReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRoom()
		);
	}

	/**
	 * @test
	 */
	public function setRoomForStringSetsRoom()
	{
		$this->subject->setRoom('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'room',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity()
	{
		$this->subject->setCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'city',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getZipReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getZip()
		);
	}

	/**
	 * @test
	 */
	public function setZipForStringSetsZip()
	{
		$this->subject->setZip('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zip',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRegionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRegion()
		);
	}

	/**
	 * @test
	 */
	public function setRegionForStringSetsRegion()
	{
		$this->subject->setRegion('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'region',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCountryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCountry()
		);
	}

	/**
	 * @test
	 */
	public function setCountryForStringSetsCountry()
	{
		$this->subject->setCountry('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'country',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCompanyReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCompany()
		);
	}

	/**
	 * @test
	 */
	public function setCompanyForStringSetsCompany()
	{
		$this->subject->setCompany('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'company',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPositionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPosition()
		);
	}

	/**
	 * @test
	 */
	public function setPositionForStringSetsPosition()
	{
		$this->subject->setPosition('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'position',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMessageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMessage()
		);
	}

	/**
	 * @test
	 */
	public function setMessageForStringSetsMessage()
	{
		$this->subject->setMessage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'message',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSkypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSkype()
		);
	}

	/**
	 * @test
	 */
	public function setSkypeForStringSetsSkype()
	{
		$this->subject->setSkype('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'skype',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTwitterReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTwitter()
		);
	}

	/**
	 * @test
	 */
	public function setTwitterForStringSetsTwitter()
	{
		$this->subject->setTwitter('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'twitter',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFacebookReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFacebook()
		);
	}

	/**
	 * @test
	 */
	public function setFacebookForStringSetsFacebook()
	{
		$this->subject->setFacebook('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'facebook',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkedinReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLinkedin()
		);
	}

	/**
	 * @test
	 */
	public function setLinkedinForStringSetsLinkedin()
	{
		$this->subject->setLinkedin('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linkedin',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCreationDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCreationDate()
		);
	}

	/**
	 * @test
	 */
	public function setCreationDateForDateTimeSetsCreationDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setCreationDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'creationDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverEmailConfigurationReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getReceiverEmailConfiguration()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverEmailConfigurationForBoolSetsReceiverEmailConfiguration()
	{
		$this->subject->setReceiverEmailConfiguration(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'receiverEmailConfiguration',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverEmailSentReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getReceiverEmailSent()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverEmailSentForBoolSetsReceiverEmailSent()
	{
		$this->subject->setReceiverEmailSent(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'receiverEmailSent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverName()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverNameForStringSetsReceiverName()
	{
		$this->subject->setReceiverName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverEmail()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverEmailForStringSetsReceiverEmail()
	{
		$this->subject->setReceiverEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverSenderNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverSenderName()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverSenderNameForStringSetsReceiverSenderName()
	{
		$this->subject->setReceiverSenderName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverSenderName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverSenderEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverSenderEmail()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverSenderEmailForStringSetsReceiverSenderEmail()
	{
		$this->subject->setReceiverSenderEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverSenderEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverNoreplyNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverNoreplyName()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverNoreplyNameForStringSetsReceiverNoreplyName()
	{
		$this->subject->setReceiverNoreplyName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverNoreplyName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverNoreplyEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverNoreplyEmail()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverNoreplyEmailForStringSetsReceiverNoreplyEmail()
	{
		$this->subject->setReceiverNoreplyEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverNoreplyEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverCcSendReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getReceiverCcSend()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverCcSendForBoolSetsReceiverCcSend()
	{
		$this->subject->setReceiverCcSend(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'receiverCcSend',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverCcNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverCcName()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverCcNameForStringSetsReceiverCcName()
	{
		$this->subject->setReceiverCcName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverCcName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverCcEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverCcEmail()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverCcEmailForStringSetsReceiverCcEmail()
	{
		$this->subject->setReceiverCcEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverCcEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverBccSendReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getReceiverBccSend()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverBccSendForBoolSetsReceiverBccSend()
	{
		$this->subject->setReceiverBccSend(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'receiverBccSend',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverBccNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverBccName()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverBccNameForStringSetsReceiverBccName()
	{
		$this->subject->setReceiverBccName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverBccName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverBccEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverBccEmail()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverBccEmailForStringSetsReceiverBccEmail()
	{
		$this->subject->setReceiverBccEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverBccEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverEmailSubjectReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverEmailSubject()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverEmailSubjectForStringSetsReceiverEmailSubject()
	{
		$this->subject->setReceiverEmailSubject('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverEmailSubject',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverEmailBodyReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverEmailBody()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverEmailBodyForStringSetsReceiverEmailBody()
	{
		$this->subject->setReceiverEmailBody('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverEmailBody',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserEmailConfigurationReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getUserEmailConfiguration()
		);
	}

	/**
	 * @test
	 */
	public function setUserEmailConfigurationForBoolSetsUserEmailConfiguration()
	{
		$this->subject->setUserEmailConfiguration(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'userEmailConfiguration',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserEmailSentReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getUserEmailSent()
		);
	}

	/**
	 * @test
	 */
	public function setUserEmailSentForBoolSetsUserEmailSent()
	{
		$this->subject->setUserEmailSent(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'userEmailSent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserSenderNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserSenderName()
		);
	}

	/**
	 * @test
	 */
	public function setUserSenderNameForStringSetsUserSenderName()
	{
		$this->subject->setUserSenderName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userSenderName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserSenderEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserSenderEmail()
		);
	}

	/**
	 * @test
	 */
	public function setUserSenderEmailForStringSetsUserSenderEmail()
	{
		$this->subject->setUserSenderEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userSenderEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserNoreplyNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserNoreplyName()
		);
	}

	/**
	 * @test
	 */
	public function setUserNoreplyNameForStringSetsUserNoreplyName()
	{
		$this->subject->setUserNoreplyName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userNoreplyName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserNoreplyEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserNoreplyEmail()
		);
	}

	/**
	 * @test
	 */
	public function setUserNoreplyEmailForStringSetsUserNoreplyEmail()
	{
		$this->subject->setUserNoreplyEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userNoreplyEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserCcSendReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getUserCcSend()
		);
	}

	/**
	 * @test
	 */
	public function setUserCcSendForBoolSetsUserCcSend()
	{
		$this->subject->setUserCcSend(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'userCcSend',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserCcNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserCcName()
		);
	}

	/**
	 * @test
	 */
	public function setUserCcNameForStringSetsUserCcName()
	{
		$this->subject->setUserCcName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userCcName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserCcEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserCcEmail()
		);
	}

	/**
	 * @test
	 */
	public function setUserCcEmailForStringSetsUserCcEmail()
	{
		$this->subject->setUserCcEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userCcEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserBccSendReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getUserBccSend()
		);
	}

	/**
	 * @test
	 */
	public function setUserBccSendForBoolSetsUserBccSend()
	{
		$this->subject->setUserBccSend(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'userBccSend',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserBccNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserBccName()
		);
	}

	/**
	 * @test
	 */
	public function setUserBccNameForStringSetsUserBccName()
	{
		$this->subject->setUserBccName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userBccName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserBccEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserBccEmail()
		);
	}

	/**
	 * @test
	 */
	public function setUserBccEmailForStringSetsUserBccEmail()
	{
		$this->subject->setUserBccEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userBccEmail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserEmailSubjectReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserEmailSubject()
		);
	}

	/**
	 * @test
	 */
	public function setUserEmailSubjectForStringSetsUserEmailSubject()
	{
		$this->subject->setUserEmailSubject('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userEmailSubject',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserEmailBodyReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserEmailBody()
		);
	}

	/**
	 * @test
	 */
	public function setUserEmailBodyForStringSetsUserEmailBody()
	{
		$this->subject->setUserEmailBody('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userEmailBody',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFeuserReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFeuser()
		);
	}

	/**
	 * @test
	 */
	public function setFeuserForStringSetsFeuser()
	{
		$this->subject->setFeuser('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'feuser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIpReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getIp()
		);
	}

	/**
	 * @test
	 */
	public function setIpForStringSetsIp()
	{
		$this->subject->setIp('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'ip',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUseragentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUseragent()
		);
	}

	/**
	 * @test
	 */
	public function setUseragentForStringSetsUseragent()
	{
		$this->subject->setUseragent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'useragent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVisitorsCountryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVisitorsCountry()
		);
	}

	/**
	 * @test
	 */
	public function setVisitorsCountryForStringSetsVisitorsCountry()
	{
		$this->subject->setVisitorsCountry('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'visitorsCountry',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRefererDomainReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRefererDomain()
		);
	}

	/**
	 * @test
	 */
	public function setRefererDomainForStringSetsRefererDomain()
	{
		$this->subject->setRefererDomain('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'refererDomain',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRefererUriReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRefererUri()
		);
	}

	/**
	 * @test
	 */
	public function setRefererUriForStringSetsRefererUri()
	{
		$this->subject->setRefererUri('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'refererUri',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPage()
		);
	}

	/**
	 * @test
	 */
	public function setPageForStringSetsPage()
	{
		$this->subject->setPage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'page',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMobileDeviceReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getMobileDevice()
		);
	}

	/**
	 * @test
	 */
	public function setMobileDeviceForBoolSetsMobileDevice()
	{
		$this->subject->setMobileDevice(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'mobileDevice',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWebsiteLanguageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWebsiteLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setWebsiteLanguageForStringSetsWebsiteLanguage()
	{
		$this->subject->setWebsiteLanguage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'websiteLanguage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWebsiteLanguageIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWebsiteLanguageId()
		);
	}

	/**
	 * @test
	 */
	public function setWebsiteLanguageIdForStringSetsWebsiteLanguageId()
	{
		$this->subject->setWebsiteLanguageId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'websiteLanguageId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBrowserLanguageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBrowserLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setBrowserLanguageForStringSetsBrowserLanguage()
	{
		$this->subject->setBrowserLanguage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'browserLanguage',
			$this->subject
		);
	}
}
