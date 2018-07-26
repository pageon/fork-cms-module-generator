#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud actions for an entity
  Scenario: Generate an index action
    When I run the command "generate:backend:action:index" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityIndex.php" should be dumped and look like "../generate/backend/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityIndex.php"
    And the file "src/Backend/Modules/TestModule/Layout/Templates/MyTestEntityIndex.html.twig" should be dumped and look like "../generate/backend/resources/php71/Backend/Modules/TestModule/Layout/Templates/MyTestEntityIndex.html.twig"
