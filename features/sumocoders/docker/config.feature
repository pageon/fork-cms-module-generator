#noinspection CucumberUndefinedStep
Feature: It is possible to generate the docker configuration
  Scenario: Generate docker configuration for php 5.6
    When I run the command "settings:reset"
    And I run the command "sumocoders:docker:config 5.6" and I provide as input
      """
      MyTestProject[enter]
      """
    Then the command has finished successfully
    And the file "src/../docker-compose.yml" should be dumped and look like "../sumocoders/docker/resources/php56/docker-compose.yml"
    And the file "src/../docker-compose-dev.yml" should be dumped and look like "../sumocoders/docker/resources/php56/docker-compose-dev.yml"
    And the file "src/../docker-sync.yml" should be dumped and look like "../sumocoders/docker/resources/php56/docker-sync.yml"

  Scenario: Generate docker configuration for php 7.0
    When I run the command "settings:reset"
    And I run the command "sumocoders:docker:config 7.0" and I provide as input
      """
      MyTestProject[enter]
      """
    Then the command has finished successfully
    And the file "src/../docker-compose.yml" should be dumped and look like "../sumocoders/docker/resources/php70/docker-compose.yml"
    And the file "src/../docker-compose-dev.yml" should be dumped and look like "../sumocoders/docker/resources/php70/docker-compose-dev.yml"
    And the file "src/../docker-sync.yml" should be dumped and look like "../sumocoders/docker/resources/php70/docker-sync.yml"
