#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud actions for an entity
  Scenario: Generate an delete action
    When I run the command "generate:backend:action:delete" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityDelete.php" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityDelete.php"
