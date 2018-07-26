#noinspection CucumberUndefinedStep
Feature: It is possible to generate an detail action
  Scenario: Generate an detail action
    When I run the command "generate:frontend:action:detail" and I provide as input
      """
      TestModule[enter]MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]Detail[enter]
      """
    Then the command has finished successfully
    And the file "src/Frontend/Modules/TestModule/Actions/Detail.php" should be dumped and look like "../generate/frontend/resources/php71/Frontend/Modules/TestModule/Actions/Detail.php"
    And the file "src/Frontend/Modules/TestModule/Layout/Templates/Detail.html.twig" should be dumped and look like "../generate/frontend/resources/php71/Frontend/Modules/TestModule/Layout/Templates/Detail.html.twig"
