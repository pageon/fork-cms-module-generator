#noinspection CucumberUndefinedStep
Feature: It is possible to generate a class for an entity
  Scenario:
    When I run the command "generate:domain:entity" and I provide as input
      """
      MyEntity[enter]Standalone[enter]MyEntity[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyEntity.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntity.php"
    And the file "src/Standalone/MyEntityRepository.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityRepository.php"
    And the file "src/Standalone/MyEntityDataTransferObject.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityDataTransferObject.php"

  Scenario:
    When I run the command "generate:domain:entity" and I provide as input
      """
      MyEntityWithOneNullableParameter[enter]Standalone[enter]MyEntityWithOneNullableParameter[enter]y[enter]parameter1[enter][enter]1[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyEntityWithOneNullableParameter.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityWithOneNullableParameter.php"
    And the file "src/Standalone/MyEntityWithOneNullableParameterDataTransferObject.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityWithOneNullableParameterDataTransferObject.php"

  Scenario:
    When I run the command "generate:domain:entity" and I provide as input
      """
      MyEntityWithOneNotNullableParameter[enter]Standalone[enter]MyEntityWithOneNotNullableParameter[enter]y[enter]parameter1[enter][enter]0[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyEntityWithOneNotNullableParameter.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityWithOneNotNullableParameter.php"
    And the file "src/Standalone/MyEntityWithOneNotNullableParameterDataTransferObject.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityWithOneNotNullableParameterDataTransferObject.php"

  Scenario:
    When I run the command "generate:domain:entity" and I provide as input
      """
      MyEntityWithMultipleParameters[enter]Standalone[enter]MyEntityWithMultipleParameters[enter]y[enter]parameter1[enter][enter]0[enter]y[enter]parameter2[enter][enter]0[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/MyEntityWithMultipleParameters.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityWithMultipleParameters.php"
    And the file "src/Standalone/MyEntityWithMultipleParametersDataTransferObject.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/MyEntityWithMultipleParametersDataTransferObject.php"

  Scenario:
    When I run the command "generate:domain:entity" and I provide as input
      """
      MyTestEntity[enter]Backend\Modules\TestModule\Domain\MyTestEntity[enter]MyTestEntity[enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntity.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntity.php"
    And the file "src/Backend/Modules/TestModule/Resources/config/doctrine.yml" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Resources/config/doctrine.yml"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityRepository.php"
    And the file "src/Backend/Modules/TestModule/Resources/config/repositories.yml" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Resources/config/repositories.yml"
    And the file "src/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityDataTransferObject.php" should be dumped and look like "../generate/domain/resources/php71/Backend/Modules/TestModule/Domain/MyTestEntity/MyTestEntityDataTransferObject.php"

  Scenario:
    When I run the command "generate:domain:entity" and I provide as input
      """
      FormEntity[enter]Standalone[enter]FormEntityTable[enter]y[enter]string[enter]string[enter][enter]y[enter]boolean[enter]boolean[enter][enter]y[enter]time[enter]time[enter][enter]y[enter]date[enter]date[enter][enter]y[enter]datetime[enter]datetime[enter][enter]y[enter]integer[enter]integer[enter][enter]y[enter]number[enter]number[enter][enter]y[enter]text[enter]text[enter][enter][enter]
      """
    Then the command has finished successfully
    And the file "src/Standalone/FormEntity.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/FormEntity.php"
    And the file "src/Standalone/FormEntityDataTransferObject.php" should be dumped and look like "../generate/domain/resources/php71/Standalone/FormEntityDataTransferObject.php"
