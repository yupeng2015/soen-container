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

    /**
     * @param $name
     * @return object
     * @throws \ReflectionException
     */
    function getComponent($name){
        $componentConfig = $this->container[$name];
        $reflection = new \ReflectionClass($component['class']);
        $componentObject = $reflection->newInstanceArgs($component['args']);
        return $componentObject;
    }
    
}