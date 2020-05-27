<?php


namespace Soen\Container;


use Psr\Container\ContainerInterface;

class ApplicationContext
{
    public $container;
    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    function getServer($name){
        $this->container[$name];
    }
    
}