<?php

namespace Gonzakpo\AfipBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        // Compatible con Symfony 4.2+ y 5.x/6.x (TreeBuilder::root() se elimino en 5.0)
        $treeBuilder = new TreeBuilder('afip_parameters');
        $rootNode = method_exists($treeBuilder, 'getRootNode')
            ? $treeBuilder->getRootNode()
            : $treeBuilder->root('afip_parameters');

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