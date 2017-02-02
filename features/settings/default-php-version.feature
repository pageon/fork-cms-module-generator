Feature: It is possible to interact with the settings of the generator
  Scenario: Get the default php version
    When I run the command "settings:reset"
    And I run the command "settings:get:default-php-version"
    Then the output should be
    """
      7.0
    """

  Scenario: Check if you can change the default version
    When I run the command "settings:reset"
    And I run the command "settings:set:default-php-version 5.6"
    And I run the command "settings:get:default-php-version"
    Then the output should be
    """
      5.6
    """

  Scenario: Check if the reset works
    When I run the command "settings:set:default-php-version 5.6"
    And I run the command "settings:reset"
    And I run the command "settings:get:default-php-version"
    Then the output should be
    """
      7.0
    """
