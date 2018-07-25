#noinspection CucumberUndefinedStep
Feature: It is possible to generate a repository class for an entity
  Scenario: Generate a standalone repository
    When I run the command "generate:domain:repository" and I provide as input
      """
      MyEntity[enter]Standalone[enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyEntityRepository.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityRepository.php"

  Scenario: Generate a module repository
    When I run the command "generate:domain:repository" and I provide as input
      """
      MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php"
    And the file "src/Backend/Modules/TestModule/Resources/config/repositories.yml" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Resources/config/repositories.yml"
