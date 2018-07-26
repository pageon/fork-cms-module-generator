#noinspection CucumberUndefinedStep
Feature: It is possible to generate basic widget
  Scenario: Generate a widget
    When I run the command "generate:frontend:widget:base" and I provide as input
      """
      TestModule[enter]Spotlight[enter]
      """
    Then the command has finished successfully
    And the file "src/Frontend/Modules/TestModule/Widgets/Spotlight.php" should be dumped and look like "../generate/frontend/resources/php71/Frontend/Modules/TestModule/Widgets/Spotlight.php"
    And the file "src/Frontend/Modules/TestModule/Layout/Widgets/Spotlight.html.twig" should be dumped and look like "../generate/frontend/resources/php71/Frontend/Modules/TestModule/Layout/Widgets/Spotlight.html.twig"
