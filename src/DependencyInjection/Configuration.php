<?php

namespace Gonzakpo\AfipBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('afip_parameters');

        $rootNode
            ->children()
                ->arrayNode('parameters')
                    ->children()
                        ->scalarNode('CUIT')
                            ->defaultValue(0)
                        ->end()
                        ->booleanNode('production')
                            ->defaultFalse()
                        ->end()
                        ->scalarNode('res_folder')
                            ->defaultValue('config/packages/afip_res/')
                        ->end()
                        ->scalarNode('ta_folder')
                            ->defaultValue('config/packages/afip_res/')
                        ->end()
                        ->scalarNode('cert')
                            ->defaultValue('cert')
                        ->end()
                        ->scalarNode('key')
                            ->defaultValue('key')
                        ->end()
                        ->scalarNode('passphrase')
                            ->defaultValue('')
                        ->end()
                        ->arrayNode('puntos_venta')
                            ->prototype('scalar')->end()
                        ->end()                
                    ->end()
                ->end()
            ->end()
        ;
        
        return $treeBuilder;
    }
}