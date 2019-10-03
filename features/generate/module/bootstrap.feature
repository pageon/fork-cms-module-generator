#noinspection CucumberUndefinedStep
Feature: It is possible to generate the bootstrap code for a module
  Scenario: Generate the bootstrap code
    When I run the command "generate:module:bootstrap" and I provide as input
      """
      TestModule[enter][enter][enter]A test module[enter]
      """
    Then the command has finished successfully
    And the file "src/Frontend/Modules/TestModule/Config.php" should be dumped and look like "../generate/module/resources/php71/Frontend/Modules/TestModule/config.php"
    And the file "src/Backend/Modules/TestModule/Config.php" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/config.php"
    And the file "src/Backend/Modules/TestModule/DependencyInjection/TestModuleExtension.php" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/DependencyInjection/TestModuleExtension.php"
    And the file "src/Backend/Modules/TestModule/Installer/Installer.php" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/Installer/Installer.php"
    And the file "src/Backend/Modules/TestModule/Installer/Data/locale.xml" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/Installer/Data/locale.xml"
    And the file "src/Backend/Modules/TestModule/Resources/config/commands.yml" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/Resources/config/commands.yml"
    And the file "src/Backend/Modules/TestModule/Resources/config/doctrine.yml" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/Resources/config/doctrine.yml"
    And the file "src/Backend/Modules/TestModule/Resources/config/repositories.yml" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/Resources/config/repositories.yml"
    And the file "src/Backend/Modules/TestModule/Resources/config/services.yml" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/Resources/config/services.yml"
    And the file "src/Backend/Modules/TestModule/info.xml" should be dumped and look like "../generate/module/resources/php71/Backend/Modules/TestModule/info.xml"
