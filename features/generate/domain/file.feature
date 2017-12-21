#noinspection CucumberUndefinedStep
Feature: It is possible to generate an file class and its dbal type
  Scenario: Generate a standalone file code
    When I run the command "generate:domain:file" and I provide as input
      """
      MyFile[enter]Standalone[enter]3M[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyFileDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyFileDBALType.php"
    And the file "src/Standalone/MyFile.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyFile.php"

  Scenario: Generate a module file code
    When I run the command "generate:domain:file" and I provide as input
      """
      MyFile[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]3M[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyFileDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyFileDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyFile.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyFile.php"
