Feature: LibraryThing sessions
	I can log in, see my profile and log out.

	Scenario: Log in
		Given I am on the homepage
		When I log in using the configured user
		Then I should be logged in

	Scenario: See my profile
		Given I log in using the configured user
		And I save that into "USERNAME"
		When I go to "/editprofile/profile"
		Then the response status code should be 200
		And I should be on "/editprofile/profile"
		And I should see "Member name" in the "#form1" element
		And I should see "<<USERNAME>>" in the "#form1" element
