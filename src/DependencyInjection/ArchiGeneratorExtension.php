<?php

declare(strict_types=1);

namespace ArchiGeneratorBundle\DependencyInjection;

use Symfony\Bundle\MakerBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ArchiGeneratorExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): ArchiGeneratorConfiguration
    {

        $configuration = new ArchiGeneratorConfiguration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yaml');


        return $configuration;
    }

    public function prepend(ContainerBuilder $container): void
    {
        // This method allows you to prepend configuration for other bundles.
        // You can use it to set parameters that are shared across bundles.

        $config = [
            'default_path' => "%kernel.project_dir%/src/",
            'alias' => 'ArchiGeneratorBundle',
        ];

        $container->prependExtensionConfig($this->getAlias(), $config);
    }
}
