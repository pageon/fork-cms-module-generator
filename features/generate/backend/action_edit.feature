#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud actions for an entity
  Scenario: Generate an edit action
    When I run the command "generate:backend:action:edit" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityEdit.php" should be dumped and look like "../generate/backend/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityEdit.php"
    And the file "src/Backend/Modules/TestModule/Layout/Templates/MyTestEntityEdit.html.twig" should be dumped and look like "../generate/backend/resources/php71/Backend/Modules/TestModule/Layout/Templates/MyTestEntityEdit.html.twig"
