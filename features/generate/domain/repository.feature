#noinspection CucumberUndefinedStep
Feature: It is possible to generate a repository class for an entity
  Scenario: Generate a standalone repository code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:repository 5.6" and I provide as input
      """
      MyTestEntity[enter]Standalone[enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyTestEntityRepository.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyTestEntityRepository.php"

  Scenario: Generate a standalone repository code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:repository 7.0" and I provide as input
      """
      MyTestEntity[enter]Standalone[enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyTestEntityRepository.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyTestEntityRepository.php"

  Scenario: Generate a module repository code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:repository 5.6" and I provide as input
      """
      MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php"

  Scenario: Generate a module repository code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:repository 7.0" and I provide as input
      """
      MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php"
