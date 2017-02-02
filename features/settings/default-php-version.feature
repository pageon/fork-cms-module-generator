Feature: It is possible to interact with the settings of the generator
  Scenario: Get the default php version
    When I run the command "settings:reset"
    And I run the command "settings:get:default-php-version"
    Then the output should be
    """
      7.0
    """
