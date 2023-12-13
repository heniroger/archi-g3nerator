<?php

declare(strict_types=1);

namespace ArchiGeneratorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class ArchiGeneratorConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treebuilder = new TreeBuilder('archi_generator');

        $treebuilder->getRootNode()
                ->children()
                        ->scalarNode('default_path')->end()
                        ->scalarNode('alias')->end()
                ->end()

        ;

        return $treebuilder;
    }
}
