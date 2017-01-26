#!/bin/sh

# Get ENV variable
PREFIX=${PREFIX:='/usr/local'}

# Clone the git repo
git clone https://github.com/carakas/fork-cms-module-generator.git $PREFIX/fork-cms-module-generator

# cd to the fork-cms-module-generator directory
cd $PREFIX/fork-cms-module-generator

# Get composer
curl -sS https://getcomposer.org/installer | php

# Install dependencies using composer
php composer.phar install

# Symlink to $PREFIX/bin
ln -s $PREFIX/fork-cms-module-generator/app/console $PREFIX/bin/module-generator

# Get back to where we once belonged
cd -

if [ -e ~/.bash_profile ]
then
    echo "source $PREFIX/fork-cms-module-generator/console_completion.sh" >> ~/.bash_profile
fi
if [ -e ~/.zshrc ]
then
    echo "source $PREFIX/fork-cms-module-generator/console_completion.sh" >> ~/.zshrc
fi
