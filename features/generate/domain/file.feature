#noinspection CucumberUndefinedStep
Feature: It is possible to generate an file class and its dbal type
  Scenario: Generate a standalone file code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:file 5.6" and I provide as input
      """
      MyFile[enter]Standalone[enter]3M[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyFileDBALType.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyFileDBALType.php"
    And the file "src/Standalone/MyFile.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyFile.php"

  Scenario: Generate a standalone file code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:file 7.0" and I provide as input
      """
      MyFile[enter]Standalone[enter]3M[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyFileDBALType.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyFileDBALType.php"
    And the file "src/Standalone/MyFile.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyFile.php"

  Scenario: Generate a module file code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:file 5.6" and I provide as input
      """
      MyFile[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]3M[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyFileDBALType.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/MyFileDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyFile.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/MyFile.php"

  Scenario: Generate a module file code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:file 7.0" and I provide as input
      """
      MyFile[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]3M[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyFileDBALType.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/MyFileDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyFile.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/MyFile.php"
