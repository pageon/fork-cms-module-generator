#noinspection CucumberUndefinedStep
Feature: It is possible to generate the a value object
  Scenario: Generate a standalone value object
    When I run the command "generate:domain:value-object" and I provide as input
      """
      MyValueObject[enter]Standalone[enter]y[enter]first[enter]first[enter]y[enter]second[enter]second[enter]y[enter]third[enter]third[enter][enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyValueObjectDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyValueObjectDBALType.php"
    And the file "src/Standalone/MyValueObject.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyValueObject.php"

  Scenario: Generate a module value object
    When I run the command "generate:domain:value-object" and I provide as input
      """
      MyValueObject[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]y[enter]first[enter]first[enter]y[enter]second[enter]second[enter]y[enter]third[enter]third[enter][enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyValueObjectDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyValueObjectDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyValueObject.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyValueObject.php"
