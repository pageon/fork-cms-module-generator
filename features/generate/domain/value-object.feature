#noinspection CucumberUndefinedStep
Feature: It is possible to generate the a value object
  Scenario: Generate a standalone value object code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:value-object 5.6" and I provide as input
      """
      MyValueObject[enter]Standalone[enter]y[enter]first[enter]first[enter]y[enter]second[enter]second[enter]y[enter]third[enter]third[enter][enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyValueObjectDBALType.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyValueObjectDBALType.php"
    And the file "src/Standalone/MyValueObject.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyValueObject.php"

  Scenario: Generate a standalone value object code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:value-object 7.0" and I provide as input
      """
      MyValueObject[enter]Standalone[enter]y[enter]first[enter]first[enter]y[enter]second[enter]second[enter]y[enter]third[enter]third[enter][enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyValueObjectDBALType.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyValueObjectDBALType.php"
    And the file "src/Standalone/MyValueObject.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyValueObject.php"
