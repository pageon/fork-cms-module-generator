#noinspection CucumberUndefinedStep
Feature: It is possible to generate an image class and its dbal type
  Scenario: Generate a standalone image
    When I run the command "generate:domain:image" and I provide as input
      """
      MyImage[enter]Standalone[enter]5M[enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyImageDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyImageDBALType.php"
    And the file "src/Standalone/MyImage.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyImage.php"

  Scenario: Generate a module image
    When I run the command "generate:domain:image" and I provide as input
      """
      MyImage[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]5M[enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImage.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyImage.php"

  Scenario: Generate a standalone image without a maxsize
    When I run the command "generate:domain:image" and I provide as input
      """
      MyImageWithoutMaxSizeAssert[enter]Standalone[enter][enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyImageWithoutMaxSizeAssertDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyImageWithoutMaxSizeAssertDBALType.php"
    And the file "src/Standalone/MyImageWithoutMaxSizeAssert.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyImageWithoutMaxSizeAssert.php"

  Scenario: Generate a module image without a max size assert
    When I run the command "generate:domain:image" and I provide as input
      """
      MyImageWithoutMaxSizeAssert[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter][enter]{"image/jpeg"}[enter]err.JPGOnly[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageWithoutMaxSizeAssertDBALType.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageWithoutMaxSizeAssertDBALType.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageWithoutMaxSizeAssert.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyImageWithoutMaxSizeAssert.php"
