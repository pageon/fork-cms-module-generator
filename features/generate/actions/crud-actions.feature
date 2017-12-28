#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud actions for an entity
  Scenario: Generate some module entity crud actions
    When I run the command "generate:backend:crud" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityIndex.php" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityIndex.php"
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityAdd.php" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityAdd.php"
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityEdit.php" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityEdit.php"
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityDelete.php" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityDelete.php"
