#!/bin/sh

# Get ENV variable
PREFIX=${PREFIX:='/usr/local'}

# The directory where composer will install this stuff
GENERATOR_DIRECTORY='fork-cms-module-generator/vendor/justcarakas/fork-cms-module-generator/'

# Cleanup if it already exists
rm -rf $PREFIX/fork-cms-module-generator
rm -rf $PREFIX/bin/module-generator

# Clone the git repo
mkdir -p $PREFIX/fork-cms-module-generator

# cd to the fork-cms-module-generator directory
cd $PREFIX/fork-cms-module-generator

echo "install: 0/3"

# Get composer
curl -sS https://getcomposer.org/installer | php  > /dev/null

echo "install: 1/3"

# Install dependencies using composer
php composer.phar require "justcarakas/fork-cms-module-generator:*" --quiet

echo "install: 2/3"

# Symlink to $PREFIX/bin
ln -s $PREFIX/$GENERATOR_DIRECTORY/app/console $PREFIX/bin/module-generator

# Get back to where we once belonged
cd - > /dev/null

# check if the command is available already
if ! type "module-generator" > /dev/null
then
    if [ -e ~/.bash_profile ]
    then
        echo "source $PREFIX/$GENERATOR_DIRECTORY/console_completion.sh" >> ~/.bash_profile
    fi
    if [ -e ~/.zshrc ]
    then
        echo "source $PREFIX/$GENERATOR_DIRECTORY/console_completion.sh" >> ~/.zshrc
    fi
fi

echo "install: 3/3"
