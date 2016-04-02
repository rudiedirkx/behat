Feature: LibraryThing sessions
	I can log in, see my profile and log out.

	Scenario: Log in
		Given I am on the homepage
		# When I log in using username "oele" and password "boele"
		When I log in using the configured user
		Then I should be logged in

	Scenario: See my profile
		Given I log in using the configured user
		And I am logged in
		# And print last response
		When I go to "/editprofile/profile"
		Then the response status code should be 200
		And I should be on "/editprofile/profile"
		# And print last response
		And I should see "Member name"
		And I should see "Save Changes"
