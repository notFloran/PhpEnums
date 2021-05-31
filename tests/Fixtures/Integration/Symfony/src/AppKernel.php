<?php

/*
 * This file is part of the "elao/enum" package.
 *
 * Copyright (C) Elao
 *
 * @author Elao <contact@elao.com>
 */

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Elao\Enum\Bridge\Symfony\Bundle\ElaoEnumBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * AppKernel for tests.
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new DoctrineBundle(),
            new ElaoEnumBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getProjectDir() . '/config/config.yml');

        if (self::VERSION_ID < 50300) {
            $loader->load($this->getProjectDir() . '/config/config_prev_5.3.0.yml');
        } else {
            $loader->load($this->getProjectDir() . '/config/config_5.3.0.yml');
        }
    }

    public function getProjectDir()
    {
        return __DIR__ . '/../';
    }
}
