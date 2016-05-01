<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Exception\ContextException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;
// use Behat\Gherkin\Node\PyStringNode;
// use Behat\Gherkin\Node\TableNode;

class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext {

	/**
	 * Initializes context.
	 */
	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;

		date_default_timezone_set('UTC');
	}



	/**
	 * @Given I am logged in
	 * @Then I should be logged in
	 */
	public function iAmLoggedIn() {
		$this->visit('/home');
		$this->assertPageContainsText('Sign out');
		$this->assertPageContainsText($this->username);
	}



	/**
	 * @When I log in using the configured user
	 */
	public function iLogInUsingTheConfiguredUser() {
		return $this->iLogInUsingUsernameAndPassword($this->username, $this->password);
	}

	/**
	 * @When I log in using username :username and password :password
	 */
	public function iLogInUsingUsernameAndPassword($username, $password) {
		$this->username = $username;

		$this->visit('/');
		$this->fillField('formusername', $username);
		$this->fillField('formpassword', $password);
		$this->pressButton('index_signin_already');

		return $this->username;
	}

	/**
	 * @When I go to my profile
	 */
	public function iGoToMyProfile() {
		throw new PendingException();
	}

	/**
	 * @Then I should get a :arg1 response
	 */
	public function iShouldGetAResponse($arg1) {
		throw new PendingException();
	}
}
