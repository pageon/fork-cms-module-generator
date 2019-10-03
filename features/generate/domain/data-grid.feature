#noinspection CucumberUndefinedStep
Feature: It is possible to generate a datagrid for an entity
  Scenario: Generate a data grid
    When I run the command "generate:domain:data-grid" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]MyTestEntityTable[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityDataGrid.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityDataGrid.php"
