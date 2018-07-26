#noinspection CucumberUndefinedStep
Feature: It is possible to generate an index action
  Scenario: Generate an index action
    When I run the command "generate:frontend:action:index" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]Index[enter]
      """
    Then the command has finished successfully
    And the file "src/Frontend/Modules/TestModule/Actions/Index.php" should be dumped and look like "../generate/frontend/resources/php71/Frontend/Modules/TestModule/Actions/Index.php"
    And the file "src/Frontend/Modules/TestModule/Layout/Templates/Index.html.twig" should be dumped and look like "../generate/frontend/resources/php71/Frontend/Modules/TestModule/Layout/Templates/Index.html.twig"
