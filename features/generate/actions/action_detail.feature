#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic crud actions for an entity
  Scenario: Generate a detail action
    When I run the command "generate:backend:action:detail" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Actions/MyTestEntityDetail.php" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Actions/MyTestEntityDetail.php"
    And the file "src/Backend/Modules/TestModule/Layout/Templates/MyTestEntityDetail.html.twig" should be dumped and look like "../generate/actions/resources/php71/Backend/Modules/TestModule/Layout/Templates/MyTestEntityDetail.html.twig"
