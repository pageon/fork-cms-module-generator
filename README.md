# Fork-cms module generator
[![Build Status](https://travis-ci.org/pageon/fork-cms-module-generator.svg?branch=master)](https://travis-ci.org/pageon/fork-cms-module-generator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pageon/fork-cms-module-generator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pageon/fork-cms-module-generator/?branch=master)

## Installation

Simply run the installer

	curl https://raw.githubusercontent.com/pageon/fork-cms-module-generator/master/install.sh | sh

You can now run the `module-generator` command from your command line.

If you use bash or zsh you also should have autocomplete once you restart the session (or open a new tab).
## Update

run the following command

    module-generator self:update
    
## Settings

You can use the `php` parameter to change the minimum supported version of php for the generated code.

The current supported options are:
* 5.6
* 7.0 [default]
