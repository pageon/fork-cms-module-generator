#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud commands for an entity
  Scenario: Generate some standalone crud commands for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:crud-commands 5.6" and I provide as input
      """
      Standalone[enter]MyTestEntity[enter]Standalone[enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/CreateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/CreateMyTestEntity.php"
    And the file "src/Standalone/CreateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/CreateMyTestEntityHandler.php"
    And the file "src/Standalone/UpdateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/UpdateMyTestEntity.php"
    And the file "src/Standalone/UpdateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/UpdateMyTestEntityHandler.php"
    And the file "src/Standalone/DeleteMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/DeleteMyTestEntity.php"
    And the file "src/Standalone/DeleteMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php56/Standalone/DeleteMyTestEntityHandler.php"

  Scenario: Generate some standalone crud commands for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:crud-commands 7.0" and I provide as input
      """
      Standalone[enter]MyTestEntity[enter]Standalone[enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/CreateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/CreateMyTestEntity.php"
    And the file "src/Standalone/CreateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/CreateMyTestEntityHandler.php"
    And the file "src/Standalone/UpdateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/UpdateMyTestEntity.php"
    And the file "src/Standalone/UpdateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/UpdateMyTestEntityHandler.php"
    And the file "src/Standalone/DeleteMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/DeleteMyTestEntity.php"
    And the file "src/Standalone/DeleteMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php70/Standalone/DeleteMyTestEntityHandler.php"

  Scenario: Generate some module entity crud commands for php 5.6
    When I run the command "settings:reset"
    And I run the command "generate:domain:crud-commands 5.6" and I provide as input
      """
      Backend\Modules\TestModule\Domain\MyTestEntity\Command[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntityHandler.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntityHandler.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php56/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntityHandler.php"

  Scenario: Generate some module entity crud commands for php 7.0
    When I run the command "settings:reset"
    And I run the command "generate:domain:crud-commands 7.0" and I provide as input
      """
      Backend\Modules\TestModule\Domain\MyTestEntity\Command[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/Command/CreateMyTestEntityHandler.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/Command/UpdateMyTestEntityHandler.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntity.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntityHandler.php" should be dumped and look like "../generate/domain/resources/php70/Backend/Modules/TestModule/Domain/MyTestEntity/Command/DeleteMyTestEntityHandler.php"
