# Fork-cms module generator
[![Build Status](https://travis-ci.org/sumocoders/fork-cms-module-twitter.svg?branch=master)](https://travis-ci.org/sumocoders/fork-cms-module-twitter)

## Installation

Use composer to install the package to your dev dependencies.

`composer require --dev sumocoders/sumocoders/fork-cms-module-generator`

Register the following bundles in your Fork `app/AppKernel.php`, but only load them in dev or test mode.

```
class AppKernel extends Kernel
{
    /**
     * Load all the bundles we'll be using in our application.
     */
    public function registerBundles(): array
    {
        ...

        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            ...

            $bundles[] = new \Matthias\SymfonyConsoleForm\Bundle\SymfonyConsoleFormBundle();
            $bundles[] = new \ModuleGenerator\ModuleGeneratorBundle();
        }

        return $bundles;
    }

    ...
}
```
