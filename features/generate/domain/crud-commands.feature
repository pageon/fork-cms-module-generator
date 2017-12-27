#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud commands for an entity
  Scenario: Generate some module entity crud commands
    When I run the command "generate:domain:crud-commands" and I provide as input
      """
      Backend\Modules\TestModule\Domain\MyTestEntity\Command[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntityHandler.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntityHandler.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntityHandler.php"
#  @todo:
#    And the file "src/Backend/Modules/TestModule/Resources/config/commands.yml" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Resources/config/commands.yml"
