#noinspection CucumberUndefinedStep
Feature: It is possible to generate a settings action
  Scenario: Generate a settings action
    When I run the command "generate:backend:action:settings" and I provide as input
      """
      TestModule[enter]MySettings[enter]Backend\Modules\TestModule\Domain\MySettings[enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Actions/MySettings.php" should be dumped and look like "../generate/backend/resources/php71/Backend/Modules/TestModule/Actions/MySettings.php"
    And the file "src/Backend/Modules/TestModule/Layout/Templates/MySettings.html.twig" should be dumped and look like "../generate/backend/resources/php71/Backend/Modules/TestModule/Layout/Templates/MySettings.html.twig"
