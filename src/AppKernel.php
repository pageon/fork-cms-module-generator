<?php

namespace ModuleGenerator;

use Matthias\SymfonyConsoleForm\Bundle\SymfonyConsoleFormBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new SymfonyConsoleFormBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config.yml');
    }

    public function getCacheDir()
    {
        return __DIR__.'/temp/cache';
    }

    public function getLogDir()
    {
        return __DIR__.'/temp/logs';
    }

    /**
     * @throws \RuntimeException
     *
     * @return ContainerBuilder The compiled service container
     */
    protected function buildContainer()
    {
        $container = parent::buildContainer();

        $container->setParameter('cwd', getcwd());

        return $container;
    }
}
