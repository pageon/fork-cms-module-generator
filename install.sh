#!/bin/sh

# Get ENV variable
PREFIX=${PREFIX:='/usr/local'}

# The directory where composer will install this stuff
GENERATOR_DIRECTORY='fork-cms-module-generator/vendor/justcarakas/fork-cms-module-generator/'

# Clone the git repo
mkdir -p $PREFIX/fork-cms-module-generator

# cd to the fork-cms-module-generator directory
cd $PREFIX/fork-cms-module-generator

# Get composer
curl -sS https://getcomposer.org/installer | php

# Install dependencies using composer
php composer.phar require "justcarakas/fork-cms-module-generator:*"

# Symlink to $PREFIX/bin
ln -s $PREFIX/$GENERATOR_DIRECTORY/app/console $PREFIX/bin/module-generator

# Get back to where we once belonged
cd -

# Install the tab autocomplete
if [ -e ~/.bash_profile ]
then
    echo "source $PREFIX/$GENERATOR_DIRECTORY/console_completion.sh" >> ~/.bash_profile
fi
if [ -e ~/.zshrc ]
then
    echo "source $PREFIX/$GENERATOR_DIRECTORY/console_completion.sh" >> ~/.zshrc
fi
