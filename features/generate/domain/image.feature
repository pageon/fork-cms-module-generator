#noinspection CucumberUndefinedStep
Feature: It is possible to generate an image class and its dbal type
  Scenario: Generate a standalone image code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:image 5.6" and I provide as input
      """
      MyImage[enter]Standalone[enter]5M[enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyImageDBALType.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyImageDBALType.php"
    And the file "src/Standalone/MyImage.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/MyImage.php"

  Scenario: Generate a standalone image code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:image 7.0" and I provide as input
      """
      MyImage[enter]Standalone[enter]5M[enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyImageDBALType.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyImageDBALType.php"
    And the file "src/Standalone/MyImage.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/MyImage.php"

  Scenario: Generate a module image code for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:image 5.6" and I provide as input
      """
      MyImage[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]5M[enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageDBALType.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImage.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/MyImage.php"

  Scenario: Generate a module image code for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:image 7.0" and I provide as input
      """
      MyImage[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]5M[enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageDBALType.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImage.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/MyImage.php"
