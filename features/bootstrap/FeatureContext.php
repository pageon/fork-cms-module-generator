<?php

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use App\Kernel;
use App\Application;
use ModuleGenerator\Tests\Helper\ApplicationTester;
use ModuleGenerator\Tests\Helper\StringUtil;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var Application
     */
    private $application;

    /**
     * @var ApplicationTester
     */
    private $tester;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $kernel = new Kernel('test', true, __DIR__ . '/../../vendor');
        $this->application = new Application($kernel);
        $this->tester = new ApplicationTester($this->application);
    }

    /**
     * @Given /^I run the command "([^"]*)" and I provide as input$/
     */
    public function iRunTheCommandAndIProvideAsInput($name, PyStringNode $input)
    {
        $this->runCommandWithInput($name, $input);
    }

    /**
     * @Given /^I run the command "([^"]*)" and I provide as input "([^"]*)"$/
     */
    public function iRunTheCommandWithInput($name, $input)
    {
        $this->runCommandWithInput($name, $input);
    }

    private function runCommandWithInput($name, $input)
    {
        $input = str_replace('[enter]', "\n", $input);
        $this->tester->putToInputStream($input);
        $this->tester->run($name, array('interactive' => true, 'decorated' => false));
    }

    /**
     * @Given /^I run the command "([^"]*)"$/
     */
    public function iRunCommand($name)
    {
        $this->tester->run($name, array('interactive' => false, 'decorated' => false));
    }

    /**
     * @Then /^the output should be$/
     */
    public function theOutputShouldBe(PyStringNode $expectedOutput)
    {
        Assertion::same(
            StringUtil::trimLines((string) $expectedOutput),
            StringUtil::trimLines($this->getOutput())
        );
    }

    private function getOutput()
    {
        return $this->tester->getDisplay(true);
    }

    /**
     * @Then /^the command has finished successfully$/
     */
    public function theCommandHasFinishedSuccessfully()
    {
        Assertion::same($this->tester->getStatusCode(), 0);
    }

    /**
     * @Then /^the command was not successful$/
     */
    public function theCommandWasNotSuccessful()
    {
        Assertion::notSame($this->tester->getStatusCode(), 0);
    }
}
